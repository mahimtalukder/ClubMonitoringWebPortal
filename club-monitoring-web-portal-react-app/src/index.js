import React from 'react'
import ReactDOM from 'react-dom/client';
import {BrowserRouter as Router, Route, Routes} from 'react-router-dom'
import './index.css';
import reportWebVitals from './reportWebVitals'
import Home from './Components/Home'
import Auth from './Components/layouts/AuthLayouts'
import DirectorLayout from './Components/layouts/DirectorLayout'
import Logout from './Components/user/Logout'
import AdminLayouts from './Components/layouts/AdminLayouts'


const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <Router>
      <Routes>
        <Route exact path='/' element={<Home />} />
        <Route exact path='/signin' element={<Auth path="signin"/>} />
        <Route exact path='/forgetPassword' element={<Auth path="forgetPassword"/>} />
        <Route exact path='/logout' element={<Logout />} />

        {/* Director */}
        <Route exact path='/director/dashboard' element={<DirectorLayout path="dashboard"/>} />

        {/* Admin */}
        <Route exact path='/admin/dashboard' element={<AdminLayouts path="dashboard"/>} />
      </Routes>
    </Router>
  </React.StrictMode>
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
