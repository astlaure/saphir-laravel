import React from 'react';
import { createBrowserRouter } from 'react-router-dom';
import Dashboard from '../core/Dashboard';
import UserList from '../users/UserList';
import UserCreate from '../users/UserCreate';
import UserUpdate from '../users/UserUpdate';
import Layout from '../core/components/Layout';

export const router = createBrowserRouter([
    {
        path: '*',
        element: <Layout />,
        children: [
            { path: '', element: <Dashboard/> },

            { path: 'users', element: <UserList/> },
            { path: 'users/create', element: <UserCreate/> },
            { path: 'users/update/:id', element: <UserUpdate/> },
        ]
    }
], { basename: window.saphir.basename });
