@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Color Admin | Managed Tables</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
  <link href="{{asset('admin6css/custom.css')}}" rel="stylesheet" />
    <link href="{{asset('admin2/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
   
    </head>
<body>
    <div id="app"  class="app app-header-fixed app-sidebar-fixed">
    
    
        <div class="app-sidebar-bg" data-bs-theme="dark"></div>
        <div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
        <div id="content" class="app-content">
            <ol class="breadcrumb float-xl-end">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">Tables</a></li>
                <li class="breadcrumb-item active">Task Table</li>
            </ol>
            <h1 class="page-header">Task Table</h1>
            <div class="panel panel-inverse">
              
                <div  class="panel-heading-custom ">  
                </div>
                    <h4 style="margin-bottom: 0;margin-top:9px;margin-left:15px" class="panel-title0">Data Table - Default</h4>
                    <hr>
                <div class="panel-body">
                    <table id="data-table-default" width="100%" class="table table-striped table-bordered align-middle text-nowrap">
                        <thead>
                            <tr>
                                <th width="1%">Id</th>
                                <th class="text-nowrap">Task Name</th>
                                <th class="text-nowrap">Task Date</th>
                                <th class="text-nowrap">Emails</th>
                                <th class="text-nowrap">Status</th>
                                <th class="text-nowrap">Expiry Date</th>
                                <th class="text-nowrap">Progress</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($task as $index => $taskItem) {{-- Important: Use a different variable name like $taskItem --}}
                                <tr class="odd gradeX" id="task-row-{{ $taskItem->id }}">
                                    <td width="1%" class="fw-bold">{{ $index + 1 }}</td>
                                    <td>{{ $taskItem->task_name }}</td>
                                    <td>{{ $taskItem->created_at->format('M d, Y H:i') }}</td>
                                    <td>{{ $taskItem->total_emails }}</td>
                                    <td id="task-status-{{ $taskItem->id }}">{{ $taskItem->status }}</td>
                                    <td>{{ $taskItem->created_at->addDays(7)->format('M d, Y H:i') }}</td> {{-- Example: Assuming 7 days expiry from creation --}}
                                    <td id="task-progress-{{ $taskItem->id }}">
                                        <div class="progress">
                                            <div class="progress-bar {{ ($taskItem->status === 'processing' || $taskItem->status === 'pending') ? 'progress-bar-striped progress-bar-animated' : '' }}"
                                                 role="progressbar"
                                                 style="width: {{ $taskItem->progress }}%;"
                                                 aria-valuenow="{{ $taskItem->progress }}"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100">
                                                {{ $taskItem->progress }}%
                                            </div>
                                     </div>
                                    </td>
                                    <td id="task-action-{{ $taskItem->id }}">
                                        @if($taskItem->status === 'completed')
                                          <a href="{{ route('bulk.result', ['id' => $taskItem->id]) }}" class="btn btn-info-custom">View Results</a>
                                        @else
                                            <button class="btn btn-secondary" disabled>Processing...</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="hljs-wrapper">
                    <pre><code class="html" data-url="../assets/data/table-manage/default.json"></code></pre>
                </div>
                </div>
            </div>
        <a href="javascript:;" class="btn btn-icon btn-circle btn-theme btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
        </div>
   
    <script src="{{asset('admin2/assets/plugins/datatables.net/js/dataTables.min.js')}}" type="0120a43a662143d45adf1f99-text/javascript"></script>
    <script src="{{asset('admin2/assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}" type="0120a43a662143d45adf1f99-text/javascript"></script>
    <script src="{{asset('admin2/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}" type="0120a43a662143d45adf1f99-text/javascript"></script>
    <script src="{{asset('admin2/assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}" type="0120a43a662143d45adf1f99-text/javascript"></script>
  
    <script type="0120a43a662143d45adf1f99-text/javascript">
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
    
        gtag('config', 'G-Y3Q0VGQKY3');
    </script>
<script src="../../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="0120a43a662143d45adf1f99-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"942343f1aa7aa41c","version":"2025.4.0-1-g37f21b1","r":1,"serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"4db8c6ef997743fda032d4f73cfeff63","b":1}' crossorigin="anonymous"></script>
</body>

</html> 

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Collect initial task data for tasks that might still be processing
        const activeTasks = [];
        @foreach ($task as $taskItem)
            @if ($taskItem->status === 'pending' || $taskItem->status === 'processing')
                activeTasks.push({ id: {{ $taskItem->id }}, status: '{{ $taskItem->status }}' });
            @endif
        @endforeach

        function updateTaskProgress() {
            if (activeTasks.length === 0) {
                console.log('No active tasks, stopping polling.');
                clearInterval(pollInterval); // Stop the interval if no tasks are active
                return;
            }

            // Create a copy of activeTasks to iterate over, as we might modify the original
            [...activeTasks].forEach((task, index) => {
                // Check if the task is still in the activeTasks array before fetching
                // This handles cases where a task might complete right before the next fetch
                const currentTaskIndex = activeTasks.findIndex(at => at.id === task.id);
                if (currentTaskIndex === -1) {
                    return; // Task already completed and removed, skip it
                }

                fetch(`{{ url('/bulk-verification') }}/${task.id}/progress`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        const progressBarContainer = document.getElementById(`task-progress-${data.id}`);
                        const progressBarDiv = progressBarContainer ? progressBarContainer.querySelector('.progress-bar') : null;
                        const statusTd = document.getElementById(`task-status-${data.id}`);
                        const actionTd = document.getElementById(`task-action-${data.id}`);

                        if (progressBarDiv) {
                            progressBarDiv.style.width = data.progress + '%';
                            progressBarDiv.setAttribute('aria-valuenow', data.progress);
                            progressBarDiv.textContent = data.progress + '%';

                            // Update progress bar animation based on status
                            if (data.status === 'processing') {
                                progressBarDiv.classList.add('progress-bar-animated', 'progress-bar-striped');
                            } else {
                                progressBarDiv.classList.remove('progress-bar-animated', 'progress-bar-striped');
                            }
                        }

                        if (statusTd) {
                            statusTd.textContent = data.status;
                        }

                        // If the task is completed or failed, update action button and remove from activeTasks
                        if (data.status === 'completed' || data.status === 'failed') {
                            if (actionTd) {
                                if (data.status === 'completed') {
                                    actionTd.innerHTML = `<a href="{{ url('/bulk-verification') }}/${data.id}/results" class="btn btn-info">View Results</a>`;
                                } else { // failed
                                    actionTd.innerHTML = `<span class="text-danger">Failed</span>`;
                                }
                            }
                            // Remove from the array of active tasks so we don't keep polling it
                            const removeIndex = activeTasks.findIndex(at => at.id === data.id);
                            if (removeIndex > -1) {
                                activeTasks.splice(removeIndex, 1);
                            }
                        }
                    })
                    .catch(error => {
                        console.error(`Error fetching task progress for ID ${task.id}:`, error);
                    });
            });
        }

        // Poll every 3 seconds (adjust as needed, consider server load)
        const pollInterval = setInterval(updateTaskProgress, 3000); // 3000 milliseconds = 3 seconds

        // Initial update when the page loads
        updateTaskProgress();
    });
</script>
@endpush