import React from 'react';
import { Link, Outlet } from 'react-router-dom';
import LogoutForm from './LogoutForm';
import NotificationCenter from './NotificationCenter';
import { useTranslation } from 'react-i18next';

export default function Layout() {
    const { t } = useTranslation();

    return (
        <>
            <NotificationCenter />
            <aside className="sidebar p-4 vh-100 d-flex flex-column">
                <h3 className="text-center text-uppercase text-white my-4">Factoria</h3>
                <hr className="border-white"/>
                <ul className="nav flex-column">
                    <li className="nav-item">
                        <Link to="/" className="nav-link text-white text-capitalize">{t('dashboard')}</Link>
                    </li>
                    <li className="nav-item">
                        <Link to="/users" className="nav-link text-white text-capitalize">{t('users')}</Link>
                    </li>
                    <li className="nav-item">
                        <Link to="/users" className="nav-link text-white text-capitalize">{t('documents')}</Link>
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
