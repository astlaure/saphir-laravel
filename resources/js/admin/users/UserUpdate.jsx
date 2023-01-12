import React from 'react';
import { useParams } from 'react-router-dom';
import UserUpdateForm from './components/UserUpdateForm';
import UserUpdatePasswordForm from './components/UserUpdatePasswordForm';
import useDataLoader from '../core/hooks/useDataLoader';
import { useTranslation } from 'react-i18next';

export default function UserUpdate() {
    const params = useParams();
    const { t } = useTranslation();
    const [user, loading, errors] = useDataLoader(`/users/${params.id}`, null);

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
                    <UserUpdateForm user={user} />
                </div>
            </div>
            <div className="card border-0 shadow mt-4 mw-50e mx-auto">
                <div className="card-body">
                    <UserUpdatePasswordForm user={user} />
                </div>
            </div>
        </div>
    );
}
