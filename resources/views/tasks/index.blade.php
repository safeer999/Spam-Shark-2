@extends('layouts.app')

@section('content')

<style>
    .bg-success-custom{
        background-color: #006f5c;
    }.progress-bar {
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}
#taskTable th,
    #taskTable td {
        padding: 0.4rem; /* Adjust padding to decrease row height */
        font-size: 16px; /* Slightly smaller font size */
    }
    .table-responsive-custom {
        max-height: 400px; /* Set a max height for the table container */
        overflow-y: auto; /* Enable vertical scrolling if content exceeds max-height */
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body  card-border card-top-highlight">
                    <h4 style="color:#006f5c;font-weight:700;font-size:30px " class="card-title ">Tasks & Results</h4>
                    <div class="table-responsive ">
                        {{-- IMPORTANT: Remove 'zero-configuration' if it's causing auto-init issues. --}}
                        {{-- We will manually initialize DataTables via JavaScript. --}}
                        <table style="color:rgba(0, 164, 128, 1)"  class="table table-striped " id="taskTable">
                            <thead>
                                <tr>
                                     <th>Id</th>
                                    <th>Task Name</th>
                                    <th>Task Date</th>
                                    <th>Emails</th>
                                    <th>Status</th>
                                 
                                    <th>Progress</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 16px;color:black">
                                {{-- Loop through your tasks to populate the table rows --}}
                                @foreach ($task as $index => $taskItem)
                                <tr id="task-row-{{ $taskItem->id }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $taskItem->task_name }}</td>
                                    <td>{{ $taskItem->created_at->format('M d, Y H:i') }}</td>
                                    <td>{{ $taskItem->total_emails }}</td>
                                    <td id="task-status-{{ $taskItem->id }}">{{ ucfirst($taskItem->status) }}</td> {{-- Added ucfirst for consistent display --}}
                                  
                                    <td id="task-progress-{{ $taskItem->id }}">
                                        <div style="height: 15px; " class="progress">
                                            <div class="progress-bar
                                                @if($taskItem->status === 'processing' || $taskItem->status === 'pending')
                                                    bg-info progress-bar-striped progress-bar-animated
                                                @elseif($taskItem->status === 'completed')
                                                    bg-success-custom
                                                @elseif($taskItem->status === 'failed')
                                                    bg-danger
                                                @else
                                                    bg-warning {{-- Default or other status --}}
                                                @endif
                                                "
                                                role="progressbar"
                                                style="width: {{ $taskItem->progress ?? 0 }}%;"
                                                aria-valuenow="{{ $taskItem->progress ?? 0 }}"
                                                aria-valuemin="0"
                                                aria-valuemax="100">
                                                {{ $taskItem->progress ?? 0 }}%
                                            </div>
                                        </div>
                                    </td>
                                    <td id="task-action-{{ $taskItem->id }}">
                                        @if($taskItem->status === 'completed')
                                            <a href="{{ route('bulk.result', ['id' => $taskItem->id]) }}" class="btn btn-info-custom">View Results</a>
                                        @elseif($taskItem->status === 'failed')
                                            <span class="text-danger">Failed</span>
                                        @else
                                            <button class="btn btn-secondary" disabled>Processing...</button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            {{-- No <tfoot> needed unless you specifically want footer features from DataTables --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>

@endsection

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
