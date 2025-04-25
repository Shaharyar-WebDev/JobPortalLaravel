import { appInit } from './appInit.js';
import { initNprogress } from './helpers/nprogress.js';
import { NumberCounter } from './helpers/numberCounter.js';
import { initSpy } from './helpers/observer.js';
import { initEventListeners } from './helpers/eventlisteners.js';
import { showToast } from './helpers/alert.js';

const init = () => {
    appInit();
    initNprogress();
}

initEventListeners(init);

