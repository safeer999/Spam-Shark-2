@extends('layouts.app')

@section('content')
<style>
    
    /* Or if you want to float the link */
    /* .link-understanding {
        float: right;
    } */
    </style>

  <div class="container py-4">
        <h2 class="mb-4 text-center">Email Analysis Reports</h2>
        <div id="cards-container" class="row g-3">
            
            <div class="col-12 col-md-6 col-lg-6 card-item " data-deliverable="850" data-undeliverable="369" data-catchall="562" data-unknown="219">
                <div class="card shadow-sm rounded p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-secondary" style="font-size: 0.875rem; font-weight: 400;">domain-2000.csv</div>
                        <div class="d-flex align-items-center gap-2 text-secondary" style="font-size: 0.75rem; font-weight: 400;">
                            <i class="far fa-calendar-alt"></i>
                            <span>Nov 30</span>
                            <span class="label-analysis text-uppercase">Analysis</span>
                            <button class="btn-result" type="button">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Result</span>
                                <br>
                            </button>
                        </div>
                    </div>
                    <div class="d-flex gap-4"> 
                      
                        <div class="chart-wrapper flex-shrink-0">
                            <canvas id="donutChart-0" width="96" height="96" aria-label="Donut chart showing email deliverability distribution" role="img"></canvas>
                            <div class="donut-center-text">
                                Emails
                                <strong>2001</strong>
                            </div>
                        </div>
                        <div class="flex-grow-1 d-flex flex-column justify-content-center gap-2 " style="font-size: 0.75rem; font-weight: 400; color: #4b5563;">
                              <div  class="email-stat-row ">
        <span class="color-dot color-deliverable ml-xl-5"></span>
        <span style="font-size: 0.75rem; font-weight: 400; color: #4b5563;" class="label  ">Deliverable</span>
        <span class="value text-gray-400">850</span>
        <span class="percent text-gray-400">42.48%</span>
    </div>
                           <div  class="email-stat-row ">
        <span class=" color-dot color-undeliverable  ml-xl-5"></span>
        <span style="font-size: 0.75rem; font-weight: 400; color: #4b5563;" class="label   ">Undeliverable</span>
        <span class="value text-gray-400">850</span>
        <span class="percent text-gray-400">42.48%</span>
    </div>
                            <div  class="email-stat-row ">
        <span class="color-dot color-catchall ml-xl-5"></span>
        <span style="font-size: 0.75rem; font-weight: 400; color: #4b5563;" class="label  ">Catch-all</span>
        <span class="value text-gray-400">850</span>
        <span class="percent text-gray-400">42.48%</span>
    </div>
                           <div  class="email-stat-row ">
        <span class="color-dot color-unknown ml-xl-5"></span>
        <span style="font-size: 0.75rem; font-weight: 400; color: #4b5563;" class="label  ">Unknown</span>
        <span class="value text-gray-400">850</span>
        <span class="percent text-gray-400">42.48%</span>
    </div>
                        </div>
                    </div>
                    <div class="mt-3 custom-align-right custom-align-right ">
                        <a class="link-understanding " href="#" tabindex="0">
                            Understanding Result <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                    <div class="d-flex align-items-center gap-2 mt-2" style="font-size: 0.75rem; font-weight: 400;">
                        <div class="badge-verified">Verified</div>
                        <div class="text-gray-400">100%</div>
                    </div>
                    <div class="progress mt-1" style="height: 4px; border-radius: 4px;">
                        <div class="progress-bar progress-bar-green" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>

            

             
            <div class="col-12 col-md-6 col-lg-6 card-item " data-deliverable="850" data-undeliverable="369" data-catchall="562" data-unknown="219">
                <div class="card shadow-sm rounded p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-secondary" style="font-size: 0.875rem; font-weight: 400;">domain-2000.csv</div>
                        <div class="d-flex align-items-center gap-2 text-secondary" style="font-size: 0.75rem; font-weight: 400;">
                            <i class="far fa-calendar-alt"></i>
                            <span>Nov 30</span>
                            <span class="label-analysis text-uppercase">Analysis</span>
                            <button class="btn-result" type="button">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Result</span>
                                <br>
                            </button>
                        </div>
                    </div>
                    <div class="d-flex gap-4"> 
                      
                        <div class="chart-wrapper flex-shrink-0">
                            <canvas id="donutChart-0" width="96" height="96" aria-label="Donut chart showing email deliverability distribution" role="img"></canvas>
                            <div class="donut-center-text">
                                Emails
                                <strong>2001</strong>
                            </div>
                        </div>
                        <div class="flex-grow-1 d-flex flex-column justify-content-center gap-2 " style="font-size: 0.75rem; font-weight: 400; color: #4b5563;">
                              <div  class="email-stat-row ">
        <span class="color-dot color-deliverable ml-xl-5"></span>
        <span style="font-size: 0.75rem; font-weight: 400; color: #4b5563;" class="label  ">Deliverable</span>
        <span class="value text-gray-400">850</span>
        <span class="percent text-gray-400">42.48%</span>
    </div>
                           <div  class="email-stat-row ">
        <span class=" color-dot color-undeliverable  ml-xl-5"></span>
        <span style="font-size: 0.75rem; font-weight: 400; color: #4b5563;" class="label   ">Undeliverable</span>
        <span class="value text-gray-400">850</span>
        <span class="percent text-gray-400">42.48%</span>
    </div>
                            <div  class="email-stat-row ">
        <span class="color-dot color-catchall ml-xl-5"></span>
        <span style="font-size: 0.75rem; font-weight: 400; color: #4b5563;" class="label  ">Catch-all</span>
        <span class="value text-gray-400">850</span>
        <span class="percent text-gray-400">42.48%</span>
    </div>
                           <div  class="email-stat-row ">
        <span class="color-dot color-unknown ml-xl-5"></span>
        <span style="font-size: 0.75rem; font-weight: 400; color: #4b5563;" class="label  ">Unknown</span>
        <span class="value text-gray-400">850</span>
        <span class="percent text-gray-400">42.48%</span>
    </div>
                        </div>
                    </div>
                    <div class="mt-3 custom-align-right custom-align-right ">
                        <a class="link-understanding " href="#" tabindex="0">
                            Understanding Result <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                    <div class="d-flex align-items-center gap-2 mt-2" style="font-size: 0.75rem; font-weight: 400;">
                        <div class="badge-verified">Verified</div>
                        <div class="text-gray-400">100%</div>
                    </div>
                    <div class="progress mt-1" style="height: 4px; border-radius: 4px;">
                        <div class="progress-bar progress-bar-green" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        

        <div class="pagination-controls mt-4">
            <span>Show</span>
            <select id="cards-per-page-select" class="form-select w-auto">
                <option value="4" selected>4</option>
                <option value="8" >8</option>
                <option value="12">12</option>
                <option value="16">16</option>
                <option value="all">All</option>
            </select>
            <span id="pagination-info" class="pagination-info">1-8 of 8</span>

            <nav aria-label="Page navigation">
                <ul class="pagination mb-0">
                    <li class="page-item" id="prev-page-btn">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item" id="next-page-btn">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>


  
@endsection