<style>
    .custom_accordian {
        display: flex;
        justify-content: space-between;
        background: white;
        border-radius: 8px;
        padding: 1%;
        margin: 20px 0;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Make a Plan') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="post" action="makePlan">
                    @for($i=0;$i<7;$i++)
                        <div class="jumbotron">
                            <div style="display: flex;justify-content: space-between;flex-wrap: wrap">
                                <div>
                                    day{{$i+1}}
                                </div>
                                <div>
                                    <button class="btn btn-primary" onclick="addFunction({{$i}})"
                                            type="button">Add
                                    </button>
                                </div>
                            </div>
                            <div id="accordians_data_{{$i}}">
                            </div>
                            <br>
                            <br></div>
                    @endfor
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script type="text/javascript">
    function addFunction(parent_number) {
        let document_body = document.getElementById('accordians_data_' + parent_number);
        let child_count = document_body.childElementCount;
        let child_data = ' <div class="custom_accordian" style="display: flex;flex-direction: column">' +
            '<div style="display: flex;justify-content: space-between"><input class="form-control"  name="custom_accordian_' + parent_number + "_" + child_count + '"/>' +
            '<button  type="button" onclick="toggleSubActivity(' + parent_number + ',' + child_count + ')"><span>Icon Down</span></button><button class="btn btn-danger" type="button" onclick="remove(this)">Remove</button></div>' +
            '<div style="display: none;justify-content: center" id="sub_activity_' + parent_number + "_" + child_count + '"><span>I am sub activity</span></div>' +
            '</div>';
        document_body.innerHTML += child_data;
    }

    function toggleSubActivity(parent, child) {
        debugger;
        let sub_activity = document.getElementById('sub_activity_' + parent + '_' + child);
        if (sub_activity.style.display == 'none') {
            sub_activity.style.display = 'flex';
        } else {
            sub_activity.style.display = 'none';
        }
    }

    function remove(elem) {
        elem.parentNode.style.display = 'none';
    }
</script>
