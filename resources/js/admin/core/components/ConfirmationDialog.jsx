import React from 'react';
import { createPortal } from 'react-dom';

export default function ConfirmationDialog({ message, handleOk, handleCancel }) {
    return createPortal(
        (
            <div className="modal fade show" tabIndex="-1" style={{display: 'block', background: 'rgba(0,0,0,0.5)'}}>
                <div className="modal-dialog">
                    <div className="modal-content">
                        <div className="modal-header">
                            <h5 className="modal-title">Confirmation</h5>
                            <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div className="modal-body">
                            <p className="text-center">{message}</p>
                        </div>
                        <div className="modal-footer">
                            <button type="button" className="btn btn-outline-primary px-4" onClick={handleCancel}>Cancel</button>
                            <button type="button" className="btn btn-primary px-4" onClick={handleOk}>OK</button>
                        </div>
                    </div>
                </div>
            </div>
        ),
        document.getElementById('root'),
    );
}
