<div class="main">

    <section class="sign-in" style="margin-bottom: 30px;">
            <div class="container">
                <div class="signin-content" style="padding-top:20px;">
                <div class=" font-weight-bold mt-5" style="padding-left:50px;">
                        <h1 class="text-dark ">Student Details Form </h1>
                    </div>

                    <div class="d-flex justify-content-start mt-5" style="padding-left:40px;">
                        <input type="text" placeholder="Search" wire:model="search_key">
                    </div>
                </div>
            </div>
    </section>

        
        <!-- Table -->
        <section class="sign-in" style="margin-bottom: 45px;" >
            <div class="container">
                <div class="signin-content" style="padding-top:20px;">
               
                <div class="table-responsive mt-5">   
                   <table class="table table-striped" style="font-size:16px ">
					<thead>
						<tr class="text-white" style=" text-align: center; background: #6dabe4;">
								<!--column names-->
								<th>No</th>
								<th>Name</th>
                                <th>Course</th>
								<th>Email</th>
								<th>Duration</th>
								<th>Action</th>		
						</tr>
					</thead>
					<tbody style=" text-align: center; ">
                        @php($count = 1)
						<!--Code to dispaly the insert data form section below-->
						 @foreach ($data_list as $row)
						<tr>
								<td>{{ $count }}</td>
								<td>{{$row->name}}</td>
								<td>{{$row->course}}</td>
								<td>{{$row->email}}</td>
								<td>{{$row->duration}}</td>
								<td>
								<!--Edit button with edit function in insert.php-->
								<button wire:click='updateData({{ $row->id }})' class="btn btn-success ml-5 rounded">Edit</button>
								<!--Delete button with delete function in insert.php-->
								<button wire:click='deleteData({{ $row->id }})' class="btn btn-danger ml-4 rounded">Delete</button>
								</td>
						</tr>
						
                        @php($count++)
						@endforeach
					</tbody>
				</table>
            </div> 

            </div>
        </section>


        <!-- insert section -->
        <section class="signup" >
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Fill Info</h2>
                        <form  class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" wire:model='name' placeholder="Name"/>
                                @error('name')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="course"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="course" id="course" wire:model='course' placeholder="Course"/>
                                 @error('course')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-lock"></i></label>
                                <input type="email" name="email" id="email" wire:model='email' placeholder="Email"/>
                                 @error('email')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="duration"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="text" name="duration" id="duration" wire:model='duration' placeholder="Duration"/>
                                 @error('duration')
                                <span class="text-danger text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="submit" wire:click.prevent='saveData' class="form-submit" value="Submit"/>
                            </div>
                             @if (session()->has('add_message'))
                            <div class="alert alert-success">
                                {{ session('add_message') }}
                            </div>
                             @endif
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="assets/images/signup-image.jpg" alt="sing up image"></figure>
                        
                    </div>
                </div>
            </div>
        </section>


    </div
    

       