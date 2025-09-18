@extends('admin.master')
@section('content')
    <section class="content-area">
       <div class="row">
            <div class="col-12 col-md-3">
                <div class="dash-box bg-blue">
                    <div>
                    <p>
                            Attempts <br>
                            Per Contact
                    </p>
                    </div>
                    <div>
                        <p class="box-num" id="attepmt_per_contact"></h2>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="dash-box bg-green">
                    <div>
                    <p>
                            Attempts <br>
                            Per Lead
                    </p>
                    </div>
                    <div>
                        <p class="box-num" id="attempt_per_lead"></h2>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="dash-box bg-aqua">
                    <div>
                    <p>
                            Attempts <br>
                            Per Sales
                    </p>
                    </div>
                    <div>
                        <p class="box-num" id="attempt_per_sale"></h2>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="dash-box bg-orange">
                    <div>
                    <p>
                        Reknocked
                    </p>
                    </div>
                    <div>
                        <p class="box-num" id="reknocked"></h2>
                    </div>
                </div>
            </div>
       </div>
       <div class="row">
            <div class="col-12 col-md-9">
                <div class="sale-graph mt-5">
                    <div class="sale-head">
                        <div  class="sale-head-first-child">
                            <h2 class="font-18">Sales Report - KPI Group</h2>
                        </div>
                        <div class="sale-head-second-child">
                            <!--<div>-->
                            <!--    <ul class="d-flex align-items-center">-->
                            <!--        <li > <img src="{{ URL::to('assets/img/sale-filter-icon.png') }}" alt="" /></li>-->
                            <!--        <li class="ms-2"><p>Target</p></li>-->
                            <!--    </ul>-->
                            <!--</div>-->
                            <!--<div>-->
                            <!--    <ul class="d-flex align-items-center">-->
                            <!--        <li> <img src="{{ URL::to('assets/img/sale-filter-icon.png') }}" alt="" /></li>-->
                            <!--        <li class="ms-2"><p>Target</p></li>-->
                            <!--    </ul>-->
                            <!--</div>-->
                            <div class="sale-select">
                                <select class="form-select change-bar-chart" aria-label="Default select example ">
                                    <option selected value="Annual">Annual</option>
                                    <option value="Monthly">Monthly</option>
                                    <option value="Weekly">Weekly</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="sale-body">
                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

                        <!-- <img src="{{ URL::to('assets/img/sale-graph.png') }}" alt="" class="img-fluid mt-4" /> -->
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="univers-box mt-5 ">
                    <h2_clear_territory class="font-22 mt-3">Universe Coverage Rate</h2_clear_territory>
                    <div class="text-center mt-3">
                    <canvas id="pieChart" style="width:100%;max-width:600px"></canvas>
                        <!-- <img src="{{ URL::to('assets/img/univer-graph.png') }}" alt="" class="img-fluid" /> -->
                    </div>
                    <div class="univers-footer mt-4">
                        <ul class="d-flex align-items-center">
                            <li > <p class="unser-circle cirlce-orange"></p></li>
                            <li class="ms-2"><p>Attempts</p></li>
                        </ul>
                        <ul class="d-flex align-items-center">
                            <li > <p class="unser-circle cirlce-purple"></p></li>
                            <li class="ms-2"><p>Sale</p></li>
                        </ul>
                        <ul class="d-flex align-items-center ">
                            <li > <p class="unser-circle cirlce-aqua"></p></li>
                            <li class="ms-2"><p>Contacts</p></li>
                        </ul>
                    </div>
                </div>
            </div>
       </div>
       <div class="row mt-4 mb-5">
            <div class="col-12 col-md-4">
                <div class="territory-performance">
                    <div  class="territory-head">
                        <div>
                            <h2 class="font-18">Territory Performance</h2>
                        </div>
                        <div>
                            <img src="{{ URL::to('assets/img/territory-left.png') }}" alt="" class="img-fluid prev_perm" />
                            <img src="{{ URL::to('assets/img/territory-right.png') }}" alt="" class="img-fluid next_perm" />
                        </div>
                    </div>
                    <div class="territory-table mt-3">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Universe 4000</th>
                                    <!-- <th scope="col" class="color-light">Coverage 8%</th> -->
                                    <th scope="col">Area Goal</th>
                                    <th scope="col">Area Actual</th>
                                    </tr>
                                </thead>
                                <tbody id="ter-perform">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="territory-performance">
                    <div  class="territory-head">
                        <div>
                            <!-- <p class="font-18">Best Knock Day</p> -->
                        </div>
                        <div>
                            <img src="{{ URL::to('assets/img/territory-left.png') }}" alt="" class="img-fluid day-chart" />
                            <img src="{{ URL::to('assets/img/territory-right.png') }}" alt="" class="img-fluid time-chart" />
                        </div>
                    </div>
                    <div class="w-100 mt-3">

                    <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>

                        <!-- <img src="{{ URL::to('assets/img/knock-day.png') }}" alt="" class="img-fluid w-100" /> -->
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
               <div class="leader-box">
                <div>
                        <h2 class="font-18">Leaderboard</h2>
                    </div>
                    <div class="mt-3" id="leader_board">
                        
                    </div>
               </div>
            </div>
       </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>

<script src="{{ asset('assets/admin/js/sr-dashboard.js') }}"></script>
<script>
//   const tableContainer = document.querySelector('.table-container');
//   const tableHeader = document.querySelector('thead');

//   tableContainer.addEventListener('scroll', function() {
//     tableHeader.style.transform = `translateY(${this.scrollTop}px)`;
//   });
</script>
@endsection
