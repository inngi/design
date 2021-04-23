<x-app-layout>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <style>
        td {
            padding: 30px 0px 30px 30px;
            text-transform: capitalize;
        }

        table {
            /* border:1px solid gray; */
            margin-left: 100px;
        }

        tr {
            border: 1px solid gray;
        }

        td {
            text-align: center;
        }

        .submit {
            text-align: center;
        }

        .submitBtn {
            padding: 10px;
            background-color: orange;
            border-radius: 5px;
        }

        .cat_image {
            width: 30px;
            height: 30px;
            margin: auto;
        }

    </style>
    {{-- <form class="form"action="" method="POST"> --}}
    <table id="list">
    <caption class="pt-10">This is for the Category<a class="float-right bg-red-500 text-white rounded-sm p-2 font-bold" href="{{ asset('admin/category/create') }}">add</a></caption>
        {{-- <colgroup>
                <col style="width:50px;">
                <col style="width:100px;">
                <col style="width:200px;">
                <col style="width:200px;">
                <col style="width:200px;">
            </colgroup> --}}
        <thead>
            <tr>
                <td>no</td>
                <td>title</td>
                <td>details</td>
                <td>image</td>
                <td>edit/delete</td>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($categories as $category)
                <tr>

                    <td>{{ $i++ }}</td>
                    <td>{{ $category['title'] }}</td>
                    <td>{{ $category['detail'] }}</td>
                    <td>
                        @if ($category['image'])
                            <img class="cat_image" src={{ asset('images') . '/' . $category['image'] }}>
                        @endif
                    </td>
                    <td class="flex justify-center">
                        
                            
                            <a href="{{ asset('admin/category').'/'.$category->id.'/edit' }}" name="edit">edit</a>

                        <form class="mr-5" action="{{ asset('/admin/category').'/'.$category->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick='return confirm("데이터를 삭제하시겠습니까?")' class="italic text-red-500" type="submit" name="delete">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
        <tfoot>
            <th colspan="5"><a href="{{ asset("admin/category/create") }}">add</a></th>
        </tfoot>
    </table>
    <script>
        $(document).ready(function() {
            $('#list').DataTable({
                "processing": true,
                "bInfo": false,
                "bLengthChange": false,
                "searching":false,
                "order": [
                ]

            });
        });
        
    </script>
    {{-- </form> --}}
</x-app-layout>
