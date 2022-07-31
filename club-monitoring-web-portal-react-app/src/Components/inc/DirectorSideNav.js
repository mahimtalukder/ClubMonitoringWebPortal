import React from 'react'

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
                            <a href="#" className="nav-link">
                                <i className="link-icon" data-feather="box"></i>
                                <span className="link-title">Dashboard</span>
                            </a>
                        </li>
                        <li className="nav-item nav-category">Personal</li>
                        <li className="nav-item">
                            <a href="#" className="nav-link">
                                <i className="link-icon" data-feather="user"></i>
                                <span className="link-title">View Profile</span>
                            </a>
                        </li>
                        <li className="nav-item">
                            <a href="#" className="nav-link">
                                <i className="link-icon" data-feather="edit"></i>
                                <span className="link-title">Edit Profile</span>
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
                            <a href="#" className="nav-link">
                                <i className="link-icon" data-feather="box"></i>
                                <span className="link-title">Dashboard</span>
                            </a>
                        </li>
                        <li className="nav-item nav-category">Personal</li>
                        <li className="nav-item">
                            <a href="#" className="nav-link">
                                <i className="link-icon" data-feather="user"></i>
                                <span className="link-title">View Profile</span>
                            </a>
                        </li>
                        <li className="nav-item">
                            <a href="#" className="nav-link">
                                <i className="link-icon" data-feather="edit"></i>
                                <span className="link-title">Edit Profile</span>
                            </a>
                        </li>

                        <li className="nav-item nav-category">Services</li>
                        <li className="nav-item">
                            <a href="#" className="nav-link">
                                <i className="link-icon" data-feather="mail"></i>
                                <span className="link-title">Application</span>
                            </a>
                        </li>

                        <li className="nav-item">
                            <a className="nav-link" data-bs-toggle="collapse" href="#clubs" role="button" aria-expanded="false"
                                aria-controls="#clubs">
                                <i className="link-icon" data-feather="mail"></i>
                                <span className="link-title">Club</span>
                                <i className="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div className="collapse" id="clubs">
                                <ul className="nav sub-menu">
                                    <li className="nav-item">
                                        <a href="#" className="nav-link">All Club</a>
                                    </li>
                                    <li className="nav-item">
                                        <a href="#" className="nav-link">Create New Club</a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li className="nav-item">
                            <a href="#" className="nav-link">
                                <i className="link-icon" data-feather="edit"></i>
                                <span className="link-title">Components</span>
                            </a>
                        </li>

                        <li className="nav-item">
                            <a href="#" className="nav-link">
                                <i className="link-icon" data-feather="edit"></i>
                                <span className="link-title">Assign Executive</span>
                            </a>
                        </li>

                        <li className="nav-item">
                            <a href="#" className="nav-link">
                                <i className="link-icon" data-feather="edit"></i>
                                <span className="link-title">Executive List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

    )
}

export default DirectorSideNav