import React from "react";
import { Link } from "react-router-dom";

const DirectorSideNav = () => {
    return (
        <div>
            <nav className="sidebar">
                <div className="sidebar-header">
                    <a href="#" className="sidebar-brand">
                        CM<span>WP</span>
                    </a>
                    <div className="sidebar-toggler not-active">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div className="sidebar-body">
                    <ul className="nav">
                        <li className="nav-item nav-category">Main</li>
                        <li className="nav-item">
                            <Link
                                to={"/director/dashboard"}
                                className="nav-link"
                            >
                                <i className="link-icon" data-feather="box"></i>
                                <span className="link-title">Dashboard</span>
                            </Link>
                        </li>
                        <li className="nav-item nav-category">Personal</li>
                        <li className="nav-item">
                            <a href="#" className="nav-link">
                                <i
                                    className="link-icon"
                                    data-feather="user"
                                ></i>
                                <span className="link-title">View Profile</span>
                            </a>
                        </li>
                        <li className="nav-item">
                            <a href="#" className="nav-link">
                                <i
                                    className="link-icon"
                                    data-feather="edit"
                                ></i>
                                <span className="link-title">Edit Profile</span>
                            </a>
                        </li>

                        <li class="nav-item active">
                            <a href="http://127.0.0.1:8000/admin/change/password" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock link-icon"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                <span class="link-title">Change Password</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <nav className="sidebar">
                <div className="sidebar-header">
                    <a href="#" className="sidebar-brand">
                        CM<span>WP</span>
                    </a>
                    <div className="sidebar-toggler not-active">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div className="sidebar-body">
                    <ul className="nav">
                        <li className="nav-item nav-category">Main</li>
                        <li className="nav-item">
                            <Link
                                to={"/director/dashboard"}
                                className="nav-link"
                            >
                                <i className="link-icon" data-feather="box"></i>
                                <span className="link-title">Dashboard</span>
                            </Link>
                        </li>
                        <li className="nav-item nav-category">Personal</li>
                        <li className="nav-item">
                            <Link to="/director/profile" className="nav-link">
                                <i
                                    className="link-icon"
                                    data-feather="user"
                                ></i>
                                <span className="link-title">View Profile</span>
                            </Link>
                        </li>
                        <li className="nav-item">
                            <a href="#" className="nav-link">
                                <i
                                    className="link-icon"
                                    data-feather="edit"
                                ></i>
                                <span className="link-title">Edit Profile</span>
                            </a>
                        </li>

                        <li className="nav-item">
                            <Link to="/director/changePassword" className="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock link-icon"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                <span className="link-title">Change Password</span>
                            </Link>
                        </li>

                        <li className="nav-item nav-category">Services</li>
                        <li className="nav-item">
                            <Link
                                to={"/director/application"}
                                className="nav-link"
                            >
                                <i
                                    className="link-icon"
                                    data-feather="mail"
                                ></i>
                                <span className="link-title">Application</span>
                            </Link>
                        </li>

                        <li className="nav-item">
                            <a
                                className="nav-link"
                                data-bs-toggle="collapse"
                                href="#clubs"
                                role="button"
                                aria-expanded="false"
                                aria-controls="#clubs"
                            >
                                <i
                                    className="link-icon"
                                    data-feather="mail"
                                ></i>
                                <span className="link-title">Club</span>
                                <i
                                    className="link-arrow"
                                    data-feather="chevron-down"
                                ></i>
                            </a>
                            <div className="collapse" id="clubs">
                                <ul className="nav sub-menu">
                                    <li className="nav-item">
                                        <a href="#" className="nav-link">
                                            All Club
                                        </a>
                                    </li>
                                    <li className="nav-item">
                                        <a href="#" className="nav-link">
                                            Create New Club
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li className="nav-item">
                            <a href="#" className="nav-link">
                                <i
                                    className="link-icon"
                                    data-feather="edit"
                                ></i>
                                <span className="link-title">Components</span>
                            </a>
                        </li>

                        <li className="nav-item">
                            <a href="#" className="nav-link">
                                <i
                                    className="link-icon"
                                    data-feather="edit"
                                ></i>
                                <span className="link-title">
                                    Assign Executive
                                </span>
                            </a>
                        </li>

                        <li className="nav-item">
                            <a href="#" className="nav-link">
                                <i
                                    className="link-icon"
                                    data-feather="edit"
                                ></i>
                                <span className="link-title">
                                    Executive List
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    );
};

export default DirectorSideNav;
