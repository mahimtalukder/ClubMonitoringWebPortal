import { divide } from "lodash";
import React from "react";
import { Link } from "react-router-dom";

const MemberSideNav = () => {
    return (
        <div>
            <nav className="sidebar">
                <div className="sidebar-header">
                    <a
                        href="{{ route('memberDash') }}"
                        className="sidebar-brand"
                    >
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
                            <a
                                href="{{ route('memberDash') }}"
                                className="nav-link"
                            >
                                <i className="link-icon" data-feather="box"></i>
                                <span className="link-title">Dashboard</span>
                            </a>
                        </li>
                        <li className="nav-item nav-category">Personal</li>
                        <li className="nav-item">
                            <Link to="/member/profile" className="nav-link">
                                <i
                                    className="link-icon"
                                    data-feather="user"
                                ></i>
                                <span className="link-title">View Profile</span>
                            </Link>
                        </li>
                        <li className="nav-item">
                            <a
                                href="{{route('memberEditProfile')}}"
                                className="nav-link"
                            >
                                <i
                                    className="link-icon"
                                    data-feather="edit"
                                ></i>
                                <span className="link-title">Edit Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <nav className="sidebar">
                <div className="sidebar-header">
                    <a
                        href="{{ route('memberDash') }}"
                        className="sidebar-brand"
                    >
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
                            <Link to="/member/dashboard" className="nav-link">
                                <i className="link-icon" data-feather="box"></i>
                                <span className="link-title">Dashboard</span>
                            </Link>
                        </li>
                        <li className="nav-item nav-category">Personal</li>
                        <li className="nav-item">
                            <Link to="/member/profile" className="nav-link">
                                <i
                                    className="link-icon"
                                    data-feather="user"
                                ></i>
                                <span className="link-title">View Profile</span>
                            </Link>
                        </li>
                        <li className="nav-item">
                            <a
                                href="{{route('memberEditProfile')}}"
                                className="nav-link"
                            >
                                <i
                                    className="link-icon"
                                    data-feather="edit"
                                ></i>
                                <span className="link-title">Edit Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    );
};

export default MemberSideNav;
