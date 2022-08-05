import React from 'react'

const ExecutiveSideNav = () => {
    return (
        <div>
            <nav className="sidebar">
            <div className="sidebar-header">
                <a href="{{ route('executiveDash') }}" className="sidebar-brand">
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
                        <a href="{{ route('executiveDash') }}" className="nav-link">
                            <i className="link-icon" data-feather="box"></i>
                            <span className="link-title">Dashboard</span>
                        </a>
                    </li>
                    <li className="nav-item nav-category">Personal</li>
                    <li className="nav-item">
                        <a href="{{ route('executiveProfile') }}" className="nav-link">
                            <i className="link-icon" data-feather="user"></i>
                            <span className="link-title">View Profile</span>
                        </a>
                    </li>
                    <li className="nav-item">
                        <a href="{{ route('executiveEditProfile') }}" className="nav-link">
                            <i className="link-icon" data-feather="edit"></i>
                            <span className="link-title">Edit Profile</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <nav className="sidebar">
            <div className="sidebar-header">
                <a href="{{ route('executiveDash') }}" className="sidebar-brand">
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
                        <a href="{{ route('executiveDash') }}" className="nav-link">
                            <i className="link-icon" data-feather="box"></i>
                            <span className="link-title">Dashboard</span>
                        </a>
                    </li>
                    <li className="nav-item nav-category">Personal</li>
                    <li className="nav-item">
                        <a href="{{ route('executiveProfile') }}" className="nav-link">
                            <i className="link-icon" data-feather="user"></i>
                            <span className="link-title">View Profile</span>
                        </a>
                    </li>
                    <li className="nav-item">
                        <a href="{{ route('executiveEditProfile') }}" className="nav-link">
                            <i className="link-icon" data-feather="edit"></i>
                            <span className="link-title">Edit Profile</span>
                        </a>
                    </li>

                    <li className="nav-item nav-category">Services</li>
                    <li className="nav-item">
                        <a className="nav-link" data-bs-toggle="collapse" href="#general-pages" role="button"
                            aria-expanded="false" aria-controls="general-pages">
                            <i className="link-icon" data-feather="mail"></i>
                            <span className="link-title">Application</span>
                            <i className="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div className="collapse" id="general-pages">
                            <ul className="nav sub-menu">
                                <li className="nav-item">
                                    <a href="{{ route('executiveAllApplication') }}" className="nav-link">All Application</a>
                                </li>
                                <li className="nav-item">
                                    <a href="{{ route('executiveApplicationCompose') }}" className="nav-link">New
                                        Application</a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li className="nav-item nav-category">Users</li>
                    <li className="nav-item">
                        <a className="nav-link" data-bs-toggle="collapse" href="#member-pages" role="button"
                            aria-expanded="false" aria-controls="member-pages">
                            <i className="link-icon" data-feather="user"></i>
                            <span className="link-title">Members</span>
                            <i className="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div className="collapse" id="member-pages">
                            <ul className="nav sub-menu">
                                <li className="nav-item">
                                    <a href="{{ route('executiveViewAllMamber') }}" className="nav-link">All Members</a>
                                </li>
                                <li className="nav-item">
                                    <a href="{{ route('executiveCreateNewMamber') }}" className="nav-link">New Members</a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li className="nav-item nav-category">Notices</li>
                    <li className="nav-item">
                        <a className="nav-link" data-bs-toggle="collapse" href="#notic-pages" role="button"
                            aria-expanded="false" aria-controls="notic-pages">
                            <i className="link-icon" data-feather="book"></i>
                            <span className="link-title">Notice</span>
                            <i className="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div className="collapse" id="notic-pages">
                            <ul className="nav sub-menu">
                                <li className="nav-item">
                                    <a href="{{ route('SendNoticeMamber') }}" className="nav-link">Send Notice</a>
                                </li>
                                <li className="nav-item">
                                    <a href="{{ route('ViewAllNotice') }}" className="nav-link">View Notice</a>
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

export default ExecutiveSideNav
