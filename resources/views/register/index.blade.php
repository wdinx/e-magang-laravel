@extends('layout.main')


@section('main')
    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="assets/images/logo-light.png" alt="" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">Premium Admin & Dashboard Template</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Create New Account</h5>
                                    <p class="text-muted">Get your free velzon account now</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="/register" method="POST">
                                        @csrf
                                        <label for="image" class="form-label">Post Image</label>
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                        <input class="form-control  @error('image') is-invalid @enderror" type="file"
                                            id="image" name="image" onchange="previewImage()">
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="form-floating mb-2">
                                            <div>
                                                <label for="start_date" class="form-label">Tanggal Mulai</label>
                                                <input type="date" class="form-control" id="start_date"
                                                    name="start_date">
                                            </div>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <div>
                                                <label for="end_date" class="form-label">Tanggal Selesai</label>
                                                <input type="date" class="form-control" id="end_date" name="end_date">
                                            </div>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input type="text" name="nik"
                                                class="form-control rounded-top @error('nik') is-invalid @enderror"
                                                id="nik" placeholder="Nomor Induk Kependudukan" required
                                                value="{{ old('nik') }}">
                                            <label for="nik">Nomor Induk Kependudukan</label>
                                            @error('nik')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input type="text" name="name"
                                                class="form-control rounded-top @error('name') is-invalid @enderror"
                                                id="name" placeholder="name" required value="{{ old('name') }}">
                                            <label for="name">Name</label>
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input type="text" name="address"
                                                class="form-control rounded-top @error('address') is-invalid @enderror"
                                                id="address" placeholder="address" required value="{{ old('address') }}">
                                            <label for="address">Alamat</label>
                                            @error('address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-2">
                                            <div>
                                                <label for="birth_date" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="birth_date"
                                                    name="birth_date">
                                            </div>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input type="email" name="email"
                                                class="form-control rounded-top @error('email') is-invalid @enderror"
                                                id="email" placeholder="email" required value="{{ old('email') }}">
                                            <label for="email">Email</label>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input type="text" name="school"
                                                class="form-control rounded-top @error('school') is-invalid @enderror"
                                                id="school" placeholder="school" required value="{{ old('school') }}">
                                            <label for="school">School</label>
                                            @error('school')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-2">
                                            <div class="input-group">
                                                <label class="input-group-text" for="religion">Agama</label>
                                                <select class="form-select" id="religion" name="religion">
                                                    <option selected value="laki-laki">Islam</option>
                                                    <option value="perempuan">Kristen</option>
                                                    <option value="perempuan">Katolik</option>
                                                    <option value="perempuan">Hindu</option>
                                                    <option value="perempuan">Budha</option>
                                                    <option value="perempuan">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input type="number" name="number_phone"
                                                class="form-control rounded-top @error('number_phone') is-invalid @enderror"
                                                id="number_phone" placeholder="number_phone" required
                                                value="{{ old('number_phone') }}">
                                            <label for="number_phone">No. Telpon</label>
                                            @error('number_phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-2">
                                            <div class="input-group">
                                                <label class="input-group-text" for="gender">Jenis Kelamin</label>
                                                <select class="form-select" id="gender" name="gender">
                                                    <option selected value="laki-laki">Laki-Laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input type="password" name="password"
                                                class="form-control rounded-bottom @error('password') is-invalid @enderror"
                                                id="password" placeholder="Password" required>
                                            <label for="password">Password</label>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-2">
                                            <div class="input-group">
                                                <label class="input-group-text" for="department_id">Bagian</label>
                                                <select class="form-select" id="department_id" name="department_id">
                                                    @foreach ($departments as $department)
                                                        <option value="{{ $department->id }}">
                                                            {{ $department->department_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input type="text" name="jurusan"
                                                class="form-control rounded-top @error('jurusan') is-invalid @enderror"
                                                id="jurusan" placeholder="jurusan" required
                                                value="{{ old('jurusan') }}">
                                            <label for="jurusan">Jurusan</label>
                                            @error('jurusan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Login</button>
                                    </form>

                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Already have an account ? <a href="auth-signin-basic.html"
                                    class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer start-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                                Themesbrand
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
