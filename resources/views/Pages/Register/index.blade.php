 @extends('Layouts\app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper">
                <section class="form singup">
                 <header>Student Registration</header>
                 <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="field input">
                        <label>Student ID</label>
                        <input type="text" name="stid" placeholder="Student ID">
                        @error('stid')
                            <span class="alert-fields">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="name-details">
                        <div class="field input">
                            <label>Full Name</label>
                            <input type="text" name="name" placeholder="First Name">
                            @error('name')
                            <span class="alert-fields">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                        <div class="field input">
                            <label>Age</label>
                            <input type="text" name="age" placeholder="Enter Age">
                            @error('age')
                            <span class="alert-fields">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="field image">
                            <label>Select Image</label>
                            <input type="file" name="image">
                            @error('image')
                            <span class="alert-fields">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="field button">

                            <button class="btn btn-primary" type="submit">Submit</button>


                        </div>
                        <div class="field button">

                            <button class="btn btn-secondary" id="load">Cancel</button>

                        </div>
                 </form>

                </section>


               </div>

        </div>
    </div>
</div>

@endsection

@push('css')
<style>

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
}

.container
{
    margin-top: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 75vh;
}
    .wrapper{
    background: #fff;
    width: 400px;
    border-radius: 16px;
    box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
                0 32px 64px -48px rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
}

.singup{
    width: 380px;
}
.form{

    padding: 25px 25px;
}

.form header{
    font-size: 25px;
    font-weight: 600;
    padding-bottom: 10px;
    border-bottom: 1px solid #e6e6e6;
}

.form form{
    margin: 20px 0;
}



   .form form .field i{
    position: absolute;
    right: 15px;
    color: #ccc;
    top:70%;
    transform: translateY(-50%);
    cursor: pointer;
}

.form form .field i.active::before{
    color: #333;
    content: "\f070";
}
.form form .field
{
    display: flex;
    position: relative;
    flex-direction: column;
    margin-bottom: 10px;
}

.form form .field label{
    margin-bottom: 2px;
}

.form form .field input
{
    outline: none;
}
.form form  .input input{
    height: 40px;
    width: 100%;
    font-size: 16px;
    padding: 0 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.form form  .image input{
    font-size: 17px;
}



.form .link
{
    text-align: center;
    margin: 10px 0;
    font-size: 17px;
}

.form .link a
{
    color: #333;
}
.form .link a:hover
{
 text-decoration: underline;
}

.alert-fields{
    color: #FF0000;
    font-size: 14px;
}


</style>

@endpush
