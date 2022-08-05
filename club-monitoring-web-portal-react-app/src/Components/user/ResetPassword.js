import React from 'react'
import { Link, useNavigate, useParams } from "react-router-dom"

const ResetPassword = (props) => {
    let { id } = useParams();

    
    return (
        <div class="row">
            <div class="col-md-4 pe-md-0">
                <div class="auth-side-wrapper">

                </div>
            </div>
            <div class="col-md-8 ps-md-0">
                <div class="auth-form-wrapper px-4 py-5">
                    <a href="{{route('home')}}" class="noble-ui-logo d-block mb-2">CM<span>WP</span></a>
                    <div class="alert alert-success" role="alert">
                        <i data-feather="check" class="text-success icon-lg me-2"></i>
                        A 6 digit otp has been sent to your registered email!
                    </div>
                    

                    <form class="forms-sample" action="{{route('resetPasswordSubmitted')}}" method="post">
                        <div class="mb-3">
                            <label for="id" class="form-label">Enter Id</label>
                            <input type="text" class="form-control" id="id" name="user_id" disabled placeholder="XX-XXXXX-XX" value={id} />
                        </div>

                        <div class="mb-3">
                            <label for="otp" class="form-label">OTP</label>
                            <input type="text" class="form-control" id="otp" name="otp" placeholder="otp" />
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Enter Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                            {/* @error('password')
                            <span class="font-weight-light text-danger">{{ $message }}</span>
                            @enderror */}
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Retype Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">
                                Reset
                            </button>
                        </div>
                        <Link className='d-block mt-3 text-muted' to="/signin">Already a user? Sign In</Link>
                    </form>
                </div>
            </div>
        </div>
    )
}

export default ResetPassword