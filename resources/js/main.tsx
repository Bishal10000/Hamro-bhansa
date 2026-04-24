import '../css/app.css';
import React from 'react';
import { createRoot } from 'react-dom/client';
import RootApp from './RootApp';

const rootElement = document.getElementById('app');

if (rootElement) {
    createRoot(rootElement).render(
        <React.StrictMode>
            <RootApp />
        </React.StrictMode>,
    );
}
