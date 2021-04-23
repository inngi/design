<x-app-layout>
    this is for the Category
    <style>
        
        tr th{
            padding:30px 30px 30px 30px;
            text-transform: capitalize;
        }
        table{
            /* border:1px solid gray; */
            margin-left:100px;
        }
        tbody tr{
            border: 1px solid gray;
        }
       
        .submit{
            text-align: right;

        }
        .submitBtn{
            padding:10px;
            background-color:orange;
            border-radius: 5px;
        }

    </style>
    @if($errors)
    @foreach ($errors->all() as $error)
       <p class="text-red-500">{{ $error }}</p> 
    @endforeach
    @endif
    @if(Session::has('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    
    @endif
    <form class="form" action="{{ asset('admin/category').'/'.$category['id'] }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <table>
            <thead></thead>
            <tbody>
                <tr>
                    <th>title</th>
                    <td><input type="text" name="title" value="{{ $category->title }}"></td>
                </tr>
                <tr>
                    <th>details</th>
                    <td><input type="text" name="detail" value="{{ $category->detail }}"></td>
                </tr>
                <tr>
                    <th>image</th>
                    <td>
                        <input type="hidden" value={{ $category->image }} name="cat_image">
                        <input type="file" name="cat_image"></td>
                </tr>
                
            </tbody>
            <tfoot>
                <tr>
                    <td class="submit" colspan="2"><button class="submitBtn"type="submit" name="addCategory">Submit</button></td>
                </tr>
            </tfoot>
        </table>
    </form>
</x-app-layout>