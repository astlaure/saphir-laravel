import React from 'react';
import { createPortal } from 'react-dom';
import { useTranslation } from 'react-i18next';

export default function ConfirmationDialog({ message, handleOk, handleCancel }) {
    const { t } = useTranslation();

    return createPortal(
        (
            <div className="modal fade show" tabIndex="-1" style={{display: 'block', background: 'rgba(0,0,0,0.5)'}}>
                <div className="modal-dialog">
                    <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title text-capitalize">{t('confirmation')}</h5>
                            <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div className="modal-body">
                            <p className="text-center text-capitalize">{message}</p>
                        </div>
                        <div className="modal-footer">
                            <button type="button" className="btn btn-outline-primary px-4 text-capitalize" onClick={handleCancel}>{t('cancel')}</button>
                            <button type="button" className="btn btn-primary px-4 text-uppercase" onClick={handleOk}>{t('ok')}</button>
                        </div>
                    </div>
                </div>
            </div>
        ),
        document.getElementById('root'),
    );
}
