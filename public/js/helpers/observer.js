export const initSpy = (element, callback = (parameter) => {}, options = { repeat : true, console: false}, spyOptions = {root : null, threshold: 0.5}) => {
  
    const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if(entry.isIntersecting){
          if(options.console){
          console.groupCollapsed('[🟢 Intersection Occured, 🔥 Visibility Triggered 💦]`');
          console.log('Element :' ,element);
          console.log('Root :' ,spyOptions.root || 'ViewPort');
          console.log('Options :' ,options);
          console.log('spyOptions :' , spyOptions);
          console.groupEnd();
          }
         callback();
         if(!options.repeat){
            observer.unobserve(element);
         }
        }
  })  
  }, spyOptions);
  observer.observe(element);
  
  
  }