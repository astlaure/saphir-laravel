import React from 'react';
import { useTranslation } from 'react-i18next';

export default function Dashboard() {
    const { t } = useTranslation();

    return (
        <div className="text-capitalize">{t('dashboard')}</div>
    );
}
