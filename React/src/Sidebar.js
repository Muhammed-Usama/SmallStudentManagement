import React, { useState } from "react";
import { Link } from "react-router-dom";
import axios from "axios";

function Sidebar() {
  const [isStudentMenuOpen, setIsStudentMenuOpen] = useState(false);
  const [isTeacherMenuOpen, setIsTeacherMenuOpen] = useState(false);
  const [successMessage, setSuccessMessage] = useState(""); // State for success message

  const toggleStudentMenu = () => {
    setIsStudentMenuOpen(!isStudentMenuOpen);
  };

  const toggleTeacherMenu = () => {
    setIsTeacherMenuOpen(!isTeacherMenuOpen);
  };

  const sendEmail = () => {
    axios.get(`http://127.0.0.1:8000/api/sendgrades`)
      .then(() => {
        setSuccessMessage("Email sent successfully!"); // Set success message
        // Optionally handle student filtering or other state updates here
      })
      .catch((error) => {
        console.error('Error sending email:', error);
        setSuccessMessage("Failed to send email."); // Optionally set an error message
      });
  };

  return (
    <aside className="main-sidebar sidebar-dark-primary elevation-4">
      <Link to="index3.html" className="brand-link">
        <img
          src={`${process.env.PUBLIC_URL}/img/logo.png`}
          alt="AdminLTE Logo"
          className="brand-image img-circle elevation-3"
        />
        <span className="brand-text font-weight-light">AdminLTE 3</span>
      </Link>
      <div className="sidebar">
        <div className="user-panel mt-3 pb-3 mb-3 d-flex">
          <div className="image">
            <img
              src={`${process.env.PUBLIC_URL}/img/user2-160x160.png`}
              className="img-circle elevation-2"
              alt="User Image"
            />
          </div>
          <div className="info">
            <Link to="#" className="d-block">Alexander Pierce</Link>
          </div>
        </div>

        <div className="form-inline">
          <div className="input-group" data-widget="sidebar-search">
            <input
              className="form-control form-control-sidebar"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <div className="input-group-append">
              <button className="btn btn-sidebar">
                <i className="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <nav className="mt-2">
          <ul
            className="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false"
          >
            <li className="nav-item">
              <Link to="/" className="nav-link">
                <i className="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </Link>
            </li>

            <li className={`nav-item ${isStudentMenuOpen ? "menu-is-opening menu-open" : ""}`}>
              <Link to="#" className="nav-link" onClick={toggleStudentMenu}>
                <i className="fa-solid fa-user-graduate"></i>
                <p>
                  Students
                  <i className="fas fa-angle-left right"></i>
                </p>
              </Link>
              <ul className="nav nav-treeview">
                <li className="nav-item">
                  <Link to="/student/add" className="nav-link">
                    <i className="far fa-circle nav-icon"></i>
                    <p>Add Student</p>
                  </Link>
                </li>
                <li className="nav-item">
                  <Link to="/student" className="nav-link">
                    <i className="far fa-circle nav-icon"></i>
                    <p>Show All Students</p>
                  </Link>
                </li>
              </ul>
            </li>

            <li className={`nav-item ${isTeacherMenuOpen ? "menu-is-opening menu-open" : ""}`}>
              <Link to="#" className="nav-link" onClick={toggleTeacherMenu}>
                <i className="fas fa-chalkboard-teacher"></i>
                <p>
                  Teachers
                  <i className="fas fa-angle-left right"></i>
                </p>
              </Link>
              <ul className="nav nav-treeview">
                <li className="nav-item">
                  <Link to="/teacher/Create" className="nav-link">
                    <i className="far fa-circle nav-icon"></i>
                    <p>Add Teacher</p>
                  </Link>
                </li>
                <li className="nav-item">
                  <Link to="/teacher" className="nav-link">
                    <i className="far fa-circle nav-icon"></i>
                    <p>Show All Teachers</p>
                  </Link>
                </li>
                <li className="nav-item">
                  <Link to="#" className="nav-link">
                    <i className="far fa-circle nav-icon"></i>
                    <p>Course</p>
                  </Link>
                </li>
                <li className="nav-item">
                  <Link to="#" className="nav-link">
                    <i className="far fa-circle nav-icon"></i>
                    <p>Grades</p>
                  </Link>
                </li>
                <li className="nav-item">
                  <Link to="/teacher/Avg" className="nav-link">
                    <i className="far fa-circle nav-icon"></i>
                    <p>Grades Teacher</p>
                  </Link>
                </li>
              </ul>
            </li>

            <li>
              <Link to="/send-notifications" className="nav-link">
                <i className="fa-solid fa-bell"></i>
                <p>Send Notifications</p>
              </Link>
            </li>
            <li>
              <Link to="#" onClick={() => sendEmail(/* pass student ID here */)} className="nav-link">
                <i class="fa-solid fa-envelope"></i>
                <p>Send Email</p>
              </Link>
            </li>
          </ul>
        </nav>

        {successMessage && (
          <div className="alert alert-success" role="alert">
            {successMessage}
          </div>
        )}
      </div>
    </aside>
  );
}

export default Sidebar;