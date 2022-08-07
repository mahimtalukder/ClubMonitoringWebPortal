import React from "react";
import ReactDOM from "react-dom/client";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";
import "./index.css";
import reportWebVitals from "./reportWebVitals";
import Home from "./Components/Home";
import Auth from "./Components/layouts/AuthLayouts";
import DirectorLayout from "./Components/layouts/DirectorLayout";

import Logout from "./Components/user/Logout";
import AdminLayouts from "./Components/layouts/AdminLayouts";
import ExecutiveLayout from "./Components/layouts/ExecutiveLayout";
import MemberLayout from "./Components/layouts/MemberLayout";

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
    <React.StrictMode>
        <Router>
            <Routes>
                <Route exact path="/" element={<Home />} />
                <Route exact path="/signin" element={<Auth path="signin" />} />
                <Route
                    exact
                    path="/forgetPassword"
                    element={<Auth path="forgetPassword" />}
                />
                <Route
                    exact
                    path="/resetPassword/:id"
                    element={<Auth path="resetPassword" />}
                />
                <Route exact path="/logout" element={<Logout />} />

                {/* Director */}
                <Route
                    exact
                    path="/director/dashboard"
                    element={<DirectorLayout path="dashboard" />}
                />
                <Route
                    exact
                    path="/director/profile"
                    element={<DirectorLayout path="profile" />}
                />
                <Route
                    exact
                    path="/director/application"
                    element={<DirectorLayout path="allapplication" />}
                />
                <Route
                    exact
                    path="/director/application/read/:applicationID"
                    element={<DirectorLayout path="applicationRead" />}
                />

                {/* Admin */}
                <Route exact path="/admin/dashboard"  element={<AdminLayouts path="dashboard" />} />
                <Route
                    exact
                    path="/admin/profile"
                    element={<AdminLayouts path="profile" />}
                />
                <Route exact path="/admin/createDirector"  element={<AdminLayouts path="createDirector" />} />

                {/*Executive*/}
                <Route
                    exact
                    path="/executive/dashboard"
                    element={<ExecutiveLayout path="dashboard" />}
                />
                <Route
                    exact
                    path="/executive/profile"
                    element={<ExecutiveLayout path="profile" />}
                />
                <Route
                    exact
                    path="/executive/createMember"
                    element={<ExecutiveLayout path="createMember" />}
                />
                <Route
                    exact
                    path="/executive/editExecutive"
                    element={<ExecutiveLayout path="editExecutive" />}
                />

                {/*Member*/}
                <Route
                    exact
                    path="/member/dashboard"
                    element={<MemberLayout path="dashboard" />}
                />
                <Route
                    exact
                    path="/member/profile"
                    element={<MemberLayout path="profile" />}
                />
                <Route
                    exact
                    path="/member/editprofile"
                    element={<MemberLayout path="editprofile" />}
                />
            </Routes>
        </Router>
    </React.StrictMode>
);

reportWebVitals();
