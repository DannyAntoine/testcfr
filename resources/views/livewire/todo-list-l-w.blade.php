
<div >


    @forelse ($todos ?? [] as $task)
  
                                <li>
                                    <label >
                                        <input type="checkbox" wire:model="taskStatus.{{$task -> id}}"  wire.keydown.enter="addTodo" data-task-id="{{ $task->id }}" {{ $task->task_status ? 'checked' : '' }} >
                                        <i></i><span>{{ $task->task_name }}</span> <span> {{ \Carbon\Carbon::parse ($task -> created_at ) ->format('m/d/Y') }}</span> <a href='#'   class="bi bi-trash red"></a>
                                    </label>
                                </li>

                                @empty 
                                <label>
                                <i></i><span><strong>You currenty have no Task </strong></span> 
                                </label>
                            @endforelse

                           
                            <div class="px-4"><input type="text" name="todo" class="tdl-new form-control" placeholder="Write new item and hit 'Enter'..." wire:model="task" wire:keydown.enter="addTodo"  wire:change="taskUpdated"></div>


                            </div>
     

                            

                            <script>

document.addEventListener('livewire:load', function () {
            Livewire.on('taskAdded', function () {
                Livewire.emit('refreshLivewireComponent'); 
            });
        });

                            </script>

                

