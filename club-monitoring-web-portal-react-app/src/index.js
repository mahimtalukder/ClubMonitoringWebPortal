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

                {/* Admin */}
                <Route
                    exact
                    path="/admin/dashboard"
                    element={<AdminLayouts path="dashboard" />}
                />

                {/*Executive*/}
                <Route
                    exact
                    path="/executive/dashboard"
                    element={<ExecutiveLayout path="dashboard" />}
                />

                {/*Member*/}
                <Route
                    exact
                    path="/member/dashboard"
                    element={<MemberLayout path="dashboard" />}
                />
            </Routes>
        </Router>
    </React.StrictMode>
);

reportWebVitals();
