import React from 'react';
import { createRoot } from 'react-dom/client';
import App from './App';
import axios from 'axios';

axios.defaults.baseURL = window.saphir.api;

const root = createRoot(
    document.getElementById('root')
);

root.render(<App/>);
