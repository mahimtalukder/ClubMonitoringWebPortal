import React from 'react'
import { Link } from "react-router-dom"

const ExecutiveTopNav = () => {
  let user = JSON.parse(localStorage.getItem('user'));
  return (
    <div>
        <nav className="navbar">
        <a href="#" className="sidebar-toggler">
          <i data-feather="menu"></i>
        </a>
        <div className="navbar-content">
          <ul className="navbar-nav">
            <li className="nav-item dropdown">
              <a className="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i data-feather="mail"></i>
              </a>
              <div className="dropdown-menu p-0" aria-labelledby="messageDropdown">
                <div className="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                  <p>0 New Messages</p>
                  <a href="#" className="text-muted">Clear all</a>
                </div>
              </div>
            </li>
            <li className="nav-item dropdown">
              <a className="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i data-feather="bell"></i>
                <div className="indicator">
                  <div className="circle"></div>
                </div>
              </a>
              <div className="dropdown-menu p-0" aria-labelledby="notificationDropdown">
                <div className="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                  <p>0 New Notifications</p>
                  <a href="#" className="text-muted">Clear all</a>
                </div>
                <div className="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                  <a href="#">View all</a>
                </div>
              </div>
            </li>

            <li className="nav-item dropdown">
              <a className="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img className="wd-30 ht-30 rounded-circle" src={user.images} alt=""/>
              </a>
              <div className="dropdown-menu p-0" aria-labelledby="profileDropdown">
                <div className="d-flex flex-column align-items-center border-bottom px-5 py-3">
                  <div className="mb-3">
                    <img className="wd-80 ht-80 rounded-circle" src={user.images} alt=""/>
                  </div>
                  <div className="text-center">
                    <p className="tx-16 fw-bolder">{user.name}</p>
                    <p className="tx-12 text-muted">{user.phone}</p>
                  </div>
                </div>
                <ul className="list-unstyled p-1">
                  <li className="dropdown-item py-2">
                    <a href="#" className="text-body ms-0">
                      <i className="me-2 icon-md" data-feather="user"></i>
                      <span>Profile</span>
                    </a>
                  </li>
                  <li className="dropdown-item py-2">
                    <a href="#" className="text-body ms-0">
                      <i className="me-2 icon-md" data-feather="edit"></i>
                      <span>Edit Profile</span>
                    </a>
                  </li>
                  <li className="dropdown-item py-2">
                    <Link className="text-body ms-0" to="/logout">
                    <i className="me-2 icon-md" data-feather="log-out"></i>
                    <span>Log Out</span></Link>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>

  )
}

export default ExecutiveTopNav
