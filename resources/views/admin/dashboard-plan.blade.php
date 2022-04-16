<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Plan') }}
            <button class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#addPlanModal">
                Add
            </button>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Small Description</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($plans as $key=>$single_plan)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$single_plan->name}}</td>
                            <td>{{$single_plan->small_description}}</td>
                            <td>{{$single_plan->description}}</td>

                            <td><img
                                    src="{{asset('storage/'.$single_plan->image_url)}}" style="width: 100px"
                                    alt="no image"/></td>
                            <td>{{$single_plan->price}}</td>
                            <td>
                                <a href="#" title="Edit"><i class="bi bi-pen"></i></a>
                                <a href="#" title="Delete" onclick="deletePlan({{$single_plan->id}})"
                                   data-toggle="modal" data-target="#deletePlanModal"><i
                                        class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<div class="modal fade" id="addPlanModal" tabindex="-1" role="dialog" aria-labelledby="addPlanModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPlanModalLabel">Add Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="plan" enctype="multipart/form-data">

                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" placeholder="name"/>
                    </div>
                    <div class="form-group">
                        <label for="small_description">Small Description</label>
                        <input class="form-control" type="text" name="small_description"
                               placeholder="Small Description"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" placeholder="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image_url">Image URL</label>
                        <input class="form-control" name="image_url" type="file" accept="image/*"/>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input class="form-control" name="price" placeholder="Price" type="number"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="deletePlanModal" tabindex="-1" role="dialog" aria-labelledby="deletePlanModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPlanModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <h2>Are you sure you want to delete this plan?</h2>
            </div>
            <div class="modal-footer">
                <form method="post" action="plan/delete">
                    @csrf
                    <input type="hidden" id="plan_id" name="plan_id"/>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    function deletePlan(id) {
        console.log(id);
        document.getElementById('plan_id').value = id;
    }
</script>
