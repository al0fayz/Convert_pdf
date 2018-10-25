const ChartjsNode = require('chartjs-node');
const assert = require('assert');
const express = require("express")
const moment = require("moment")
const bodyParser = require('body-parser')
var wkhtmltopdf = require('wkhtmltopdf');
//redis
// const redis = require('redis');
// const client = redis.createClient();

// If you don't have wkhtmltopdf in the PATH, then provide
// the path to the executable (in this case for windows would be):
wkhtmltopdf.command = "C:\\Program Files\\wkhtmltopdf\\bin\\wkhtmltopdf.exe";
var fs = require("fs");
// 600x600 canvas size

function renderBars(req, res, opt) {

    var data = opt.data
    var color = opt.color
    var labels = opt.labels

    renderCanvas(req, res, {
        type: 'bar',
        data: {
            labels:labels,
            datasets: [
            {
                borderWidth: 0,
                backgroundColor: color,
                hoverBackgroundColor: color,
                data: data,
            }
            ]
        },
        options: {
            responsive: false,
            width: 600,
            height: 600,
            animation: false,
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: '#eaeaea',
                        fontFamily: "Roboto"
                    },
                    gridLines: {
                        // color: "rgba(255, 255, 255, 0.2)",
                        display: false,
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: '#eaeaea',
                        fontFamily: "Roboto",
                    },
                    gridLines: {
                    // color: "rgba(255, 255, 255, 0.4)",
                    display : false,
                    drawOnChartArea: false
                },
                barThickness: 30
            }]
        }
    }
}, 600, 600)

}

function renderPie(req, res, opt) {

    var data = opt.data
    var color = opt.color
    var label = opt.labels
    renderCanvas(req, res, {
        type: 'doughnut',
        data: {
            labels: label,
            datasets: [{
                borderWidth: 0,
                backgroundColor: color,
                hoverBackgroundColor: color,
                data: data,
            }]
        },
        options: {
            responsive: false,
            width: 600,
            height: 600,
            animation: false,
            tooltips: {
                enabled: false
            },
            legend: {
                position: false,
                // labels: {
                //     fontColor: '#fff',
                //     fontFamily: "Roboto",
                //     boxWidth: 10
                // }
                labels:false
            },
            // plugins: {
            //     afterDraw: function (chart, easing) {
            //         // var self = chart.config;    /* Configuration object containing type, data, options */
            //         // var ctx = chart.chart.ctx;  /* Canvas context used to draw with */
            //         // ...
            //         var ctx = chart.chart.ctx;
            //         ctx.font = "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif";
            //         ctx.textAlign = 'center';
            //         ctx.textBaseline = 'bottom';

            //         chart.config.data.datasets.forEach(function (dataset) {

            //             for (var i = 0; i < dataset.data.length; i++) {
            //                 var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
            //                     total = dataset._meta[Object.keys(dataset._meta)[0]].total,
            //                     mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius)/2,
            //                     start_angle = model.startAngle,
            //                     end_angle = model.endAngle,
            //                     mid_angle = start_angle + (end_angle - start_angle)/2;

            //                 var x = mid_radius * Math.cos(mid_angle);
            //                 var y = mid_radius * Math.sin(mid_angle);

            //                 ctx.fillStyle = '#fff';
            //                 if (i == 3){ // Darker text color for lighter background
            //                     ctx.fillStyle = '#444';
            //                 }
            //                 if(chart.config.type == 'doughnut' || chart.config.type == 'pie') {
            //                     var percent = String(Math.round(dataset.data[i]/total*100)) + "%";
            //                     // Display percent in another line, line break doesn't work for fillText
            //                     ctx.fillText(dataset.data[i], model.x + x, model.y + y);
            //                     ctx.fillText(percent, model.x + x, model.y + y + 15);
            //                 }

            //             }
            //         });  
            //     }
            // }
        }
    }, 600, 600)

}

var addChart = function(label, data, color) {
  return {
    label: label,
    fill: false,
    lineTension: 0,
    borderColor: color,
    borderCapStyle: 'butt',
    borderDash: [],
    borderDashOffset: 0.0,
    borderJoinStyle: 'miter',
    pointBackgroundColor: "#fff",
    data: data,
    spanGaps: false,
}
}

function renderCanvas(req, res, options, w, h) {
    let start = new Date().getTime()
    console.log(start)
    var chartNode = new ChartjsNode(w, h);
    return chartNode.drawChart(options)
    .then(() => {
        // chart is created
        // get image as png buffer
        return chartNode.getImageBuffer('image/png');
    }).then(buffer => {
        Array.isArray(buffer) // => true
        // as a stream
        return chartNode.getImageStream('image/png');
    }).then(streamResult => {
        // using the length property you can do things like
        // directly upload the image to s3 by using the
        // stream and length properties
        streamResult.stream // => Stream object
        //streamResult.length // => Integer length of stream
        res.writeHead(200, {'Content-Type': 'image/png' });
        streamResult.stream.on('data', (data) => {
            res.write(data)
        })
        streamResult.stream.on('end', () => {
            res.end()
            chartNode.destroy();
            delete chartNode;
        })
        // write to a file
        //return chartNode.writeImageToFile('image/png', __dirname + '/../testimage.png');
        console.log(new Date().getTime() - start)
    })
}
function pdf(req, res){
    wkhtmltopdf('http://127.0.0.1:8000/pdf', { 
        output: 'public/Report/report_2018.pdf',
        pageSize: 'A4'
    });
}
//redis 
// const getCache = (req, res) => {
//     const pdf = wkhtmltopdf('http://127.0.0.1:8000/pdf', { 
//                 output: 'public/Report/report_2018.pdf',
//                 pageSize: 'A4'
//             });
//   //Check the cache data from the server redis
//   client.get(pdf, (err, result) => {
//     if (result) {
//       res.send(result);
//   } else {
//     pdf(req, res);
//   }
// });
// }

var app = express()

var jsonParser = bodyParser.json()

app.get("/", (req, res) => {
    res.send("hello")
})

// app.post("/chart/line", jsonParser, (req, res) => {
//     renderLine(req, res, req.body)
// })

app.get("/chart/bar", jsonParser, (req, res) => {
    renderBars(req, res, req.body)
})

app.get("/chart/pie", jsonParser, (req, res) => {
    renderPie(req, res, req.body)
})

app.listen(8008, function () {
  console.log('Example app listening on port 8008')
})
app.get("/pdf", jsonParser, (req, res) => {
    pdf(req, res)
})
