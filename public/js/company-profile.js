import { NumberCounter } from './helpers/numberCounter.js';
import { initSpy } from './helpers/observer.js';
import { initEventListeners } from './helpers/eventlisteners.js'

const initCounters = () => {

    try {
        const jobPostCounter = document.querySelector('#counter-job-posts') || null;
        const valuationCounter = document.querySelector('#valuation-counter') || null;
    
        if (valuationCounter) initSpy(valuationCounter, () =>
            {
               new NumberCounter(valuationCounter, 1500);
           }, {repeat : true, console : true});
           
          if(jobPostCounter) initSpy(jobPostCounter, () =>
           {
               new NumberCounter(jobPostCounter, 100); 
           }, {repeat : true, console : true});
        
    } catch (error) {
        console.warn(error);
    }

} 

initEventListeners(initCounters);
