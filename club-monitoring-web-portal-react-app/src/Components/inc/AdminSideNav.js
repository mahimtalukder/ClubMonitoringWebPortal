import React from "react";
import { Link } from "react-router-dom";

const AdminSideNav = () => {
    return (
        <div>
            <nav class="sidebar">
                <div class="sidebar-header">
                    <a href="{{ route('adminDash') }}" class="sidebar-brand">
                        CM<span>WP</span>
                    </a>
                    <div class="sidebar-toggler not-active">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="sidebar-body">
                    <ul class="nav">
                        <li class="nav-item nav-category">Main</li>
                        <li class="nav-item">
                            <a href="{{ route('adminDash') }}" class="nav-link">
                                <i class="link-icon" data-feather="box"></i>
                                <span class="link-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item nav-category">Personal</li>
                        <li class="nav-item">
                            <a
                                href="{{route('adminProfile')}}"
                                class="nav-link"
                            >
                                <i class="link-icon" data-feather="user"></i>
                                <span class="link-title">View Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                href="{{route('adminEditProfile')}}"
                                class="nav-link"
                            >
                                <i class="link-icon" data-feather="edit"></i>
                                <span class="link-title">Edit Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <nav class="sidebar">
                <div class="sidebar-header">
                    <a href="{{ route('adminDash') }}" class="sidebar-brand">
                        CM<span>WP</span>
                    </a>
                    <div class="sidebar-toggler not-active">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="sidebar-body">
                    <ul class="nav">
                        <li class="nav-item nav-category">Main</li>
                        <li class="nav-item">
                            <Link to="/admin/dashboard" class="nav-link">
                                <i class="link-icon" data-feather="box"></i>
                                <span class="link-title">Dashboard</span>
                            </Link>
                        </li>
                        <li class="nav-item nav-category">Personal</li>
                        <li class="nav-item">
                            <Link to="/admin/profile" class="nav-link">
                                <i class="link-icon" data-feather="user"></i>
                                <span class="link-title">View Profile</span>
                            </Link>
                        </li>
                        <li class="nav-item">
                            <a
                                href="{{route('adminEditProfile')}}"
                                class="nav-link"
                            >
                                <i class="link-icon" data-feather="edit"></i>
                                <span class="link-title">Edit Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                href="{{route('adminChangePassword')}}"
                                class="nav-link"
                            >
                                <i class="link-icon" data-feather="lock"></i>
                                <span class="link-title">Change Password</span>
                            </a>
                        </li>

                        <li class="nav-item nav-category">Director</li>

                        <li class="nav-item">
                            <Link to="/admin/createDirector" class="nav-link">
                                <i class="link-icon" data-feather="box"></i>
                                <span class="link-title">
                                    Create Director Account
                                </span>
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link to="/admin/list/director" class="nav-link">
                                <i class="link-icon" data-feather="box"></i>
                                <span class="link-title">Director List</span>
                            </Link>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    );
};

export default AdminSideNav;
