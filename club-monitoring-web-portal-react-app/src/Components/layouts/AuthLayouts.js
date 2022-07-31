import React from 'react';
import SignIn from '../user/SignIn'
import ForgetPassword from '../user/ForgetPassword'

function Auth(props) {
    const renderAuth = () => {
        if (props.path == 'signin') {
          return <SignIn/>;
        } else if(props.path == 'forgetPassword') {
          return <ForgetPassword/>;
        }
      }
  return (
    <div className="main-wrapper">
        <div className="page-wrapper full-page">
            <div className="page-content d-flex align-items-center justify-content-center">

                <div className="row w-100 mx-0 auth-page">
                    <div className="col-md-8 col-xl-6 mx-auto">
                        <div className="card">
                            {renderAuth()}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
  )
}

export default Auth


