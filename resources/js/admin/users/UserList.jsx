import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import usePageDataLoader from '../core/hooks/usePageDataLoader';
import DeleteAction from '../core/components/DeleteAction';
import axios from 'axios';
import { useTranslation } from 'react-i18next';

export default function UserList() {
    const [page, setPage] = useState(1);
    const [userPage, loading, errors, reloadUsers] = usePageDataLoader(`/users?page=${page}`, []);

    const { t } = useTranslation();

    const handlePageChange = (value) => {
        setPage(value);
    }

    const deleteItem = (id) => {
        axios.delete(`/users/${id}`)
            .then(() => {
                reloadUsers();
                window.dispatchEvent(new CustomEvent('submit-notification', {
                    detail: { type: 'success', message: t('element deleted') }
                }));
            })
            .catch(() => {
                window.dispatchEvent(new CustomEvent('submit-notification', {
                    detail: { type: 'danger', message: t('action failed') }
                }));
            });
    }

    if (loading) return (
        <div className="center-position">
            <div className="spinner-border text-primary spinner-lg" role="status">
                <span className="visually-hidden">{t('loading...')}</span>
            </div>
        </div>
    );

    if (errors) return <h3 className="text-center mt-4 text-capitalize">{t('cannot load data')}</h3>;

    return (
        <div className="container">
            <div className="card border-0 shadow mt-4 mw-50e mx-auto">
                <div className="card-body">
                    <div className="d-flex justify-content-between align-items-center mb-4">
                        <Link to="/users/create" className="btn btn-outline-primary text-decoration-none px-4 text-capitalize">{t('create')}</Link>
                        <div className="d-flex">
                            {userPage.previous ? (
                                <button type="button" className="btn btn-link text-capitalize" onClick={() => handlePageChange(page - 1)}>{t('prev')}</button>
                            ) : (
                                <span className="btn btn-link disabled text-secondary text-capitalize">{t('prev')}</span>
                            )}
                            {userPage.next ? (
                                <button type="button" className="btn btn-link text-capitalize" onClick={() => handlePageChange(page + 1)}>{t('next')}</button>
                            ) : (
                                <span className="btn btn-link disabled text-secondary text-capitalize">{t('next')}</span>
                            )}
                        </div>
                    </div>
                    <table className="table">
                        <thead>
                        <tr>
                            <th className="text-capitalize">{t('name')}</th>
                            <th className="text-capitalize">{t('email')}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        {userPage.data.map(user => (
                            <tr key={user.id} className="align-middle">
                                <td>{user.name}</td>
                                <td>{user.email}</td>
                                <td>
                                    <Link to={`/users/update/${user.id}`} className="btn btn-link text-secondary text-decoration-none">{t('update')}</Link>
                                    <DeleteAction handleDelete={() => deleteItem(user.id)} />
                                </td>
                            </tr>
                        ))}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    );
}
