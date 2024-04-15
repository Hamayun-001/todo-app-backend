<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
     integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
     crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
</head>

<body>  
    <div class="container mt-3">
        <form method="POST" action="/addcontact">
            @csrf
            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{old('name')}}">
                <span class="text-danger">
                    @error('name')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group mb-2">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{old('email')}}">
                <span class="text-danger">
                    @error('email')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="form-group mb-2">
                <label for="exampleInputPassword1">Phone Number</label>
                <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{old('phone')}}">
                <span class="text-danger">
                    @error('phone')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="" class="form-control" aria-describedby="helpId">
                <span class="text-danger">
                    @error('password')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <br>

            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="confirmed_password" id="" class="form-control" aria-describedby="helpId">
                <span class="text-danger">
                    @error('confirmed_password')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


        <!-- View Data -->

        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
          
            <tbody>

                @if (count($contact) > 0)
                @foreach ($contact as $cont)
                <tr>
                    <th>{{ $cont->id }}</th>
                    <th>{{ $cont->name }}</th>
                    <th>{{ $cont->phone }}</th>
                    <th>{{ $cont->email }}</th>
                    <th><a href="/status/{{ $cont->id }}" class="btn btn-sm btn-{{ $cont->status ? 'success' : 'success'}}">
                            {{ $cont->status ? 'Enable' : 'Enable'}} </a></th>
                    <th><a href="/edit/{{ $cont->id }}" class="btn btn-primary">Edit</a>
                        <a href="/delete/{{ $cont->id }}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                    </th>
                </tr>
                @endforeach
                @else
                <tr>
                    <th>No Data</th>
                </tr>
                @endif
            </tbody>
        </table>
    </div>


     <!-- Popup for Delete confirmation script-->
    <script type="text/javascript">
        function confirmation(ev)
        {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                title : "Are you sure you delete this",
                text : "You want to be able to revert this",
                icon : "warning",
                buttons : true,
                dangerMode : true,
            })

            .then((willCancel) =>
            {
                if(willCancel)
                {
                    window.location.href= urlToRedirect;

                }

            });
        }

    </script>

</body>

</html>