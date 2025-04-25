import { initEventListeners } from './helpers/eventlisteners.js';
import { initChoices } from './helpers/choices.js';
const initJobs = () => {

const element = document.querySelectorAll('#custom-educations');

const element2 = document.querySelectorAll('#custom_skills');

const element3 = document.querySelectorAll('#job_skills');

const element4 = document.querySelectorAll('#company');



element.forEach(el=>{
  initChoices(el, {
    removeItemButton: true,
    placeholderValue: 'Select custom educations...',
  }, 'customEducationsUpdated');

});

element2.forEach(el2=>{
  initChoices(el2, {
    removeItemButton: true,
    placeholderValue: 'Select custom Skills...',
  } ,'customSkillsUpdated');
});

element3.forEach(el3=>{
  initChoices(el3, {
    removeItemButton: true,
    placeholderValue: 'Select Skills...',
  } ,'SkillsUpdated');
});

element4.forEach(el4=>{
  initChoices(el4, {
    removeItemButton: true,
    placeholderValue: 'Select Company...',
  } ,'CompanyUpdated');
});
}

initEventListeners(initJobs);
