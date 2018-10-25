<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SpanJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        <div class="stacked-bar-graph" style="width: 100%;">
        @php $st1=0; @endphp
        @foreach ($access as $key => $val2)
        @php $p2 = round(($val2->value/$sum2)*100 ); @endphp
        <span style="width: {{$p2 -0.5}}%" class="span bar-{{$st1}}"></span>
        @php  $st1++; @endphp
        @endforeach
        </div>
    }
}
