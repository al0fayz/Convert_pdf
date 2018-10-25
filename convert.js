var wkhtmltopdf = require('wkhtmltopdf');
// If you don't have wkhtmltopdf in the PATH, then provide
// the path to the executable (in this case for windows would be):
wkhtmltopdf.command = "C:\\Program Files\\wkhtmltopdf\\bin\\wkhtmltopdf.exe";
var fs = require("fs");

// wkhtmltopdf(fs.readFileSync("resources/views/result.blade.php", "utf8"), {
//     output: 'public/Report/result.pdf',
//     pageSize: 'A4'
// });
wkhtmltopdf('http://127.0.0.1:8000/pdf', { 
    output: 'public/Report/report_2018.pdf',
    pageSize: 'A4'
});
console.log('laporan berhasil terbuat');