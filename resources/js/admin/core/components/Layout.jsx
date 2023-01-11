import React from 'react';
import { Link, Outlet } from 'react-router-dom';
import LogoutForm from './LogoutForm';
import NotificationCenter from './NotificationCenter';

export default function Layout() {
    return (
        <>
            <NotificationCenter />
            <aside className="sidebar p-4 vh-100 d-flex flex-column">
                <h3 className="text-center text-uppercase text-white my-4">Factoria</h3>
                <hr className="border-white"/>
                <ul className="nav flex-column">
                    <li className="nav-item">
                        <Link to="/" className="nav-link text-white">Dashboard</Link>
                    </li>
                    <li className="nav-item">
                        <Link to="/users" className="nav-link text-white">Users</Link>
                    </li>
                    <li className="nav-item">
                        <Link to="/users" className="nav-link text-white">Documents</Link>
                    </li>
                </ul>
                <ul className="nav flex-column mt-auto">
                    <li className="nav-item">
                        <LogoutForm />
                    </li>
                </ul>
            </aside>
            <main className="content p-4">
                <Outlet/>
            </main>
        </>
    );
}
