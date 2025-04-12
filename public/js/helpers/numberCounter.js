export class NumberCounter {
        constructor(element, duration = 2000, endValue = null) {
            this.element = element;
            this.start = 0;
            if(!endValue){
                this.end = element.dataset.count;
            }else{
                this.end = endValue;
            }
            this.duration = duration;
            this.startTime = null;
            this.animate = this.animate.bind(this);
            requestAnimationFrame(this.animate);
        }
    
        formatNumber(num) {
            if (num >= 1_000_000_000) return (num / 1_000_000_000).toFixed(1) + 'B';
            if (num >= 1_000_000) return (num / 1_000_000).toFixed(1) + 'M';
            if (num >= 1_000) return (num / 1_000).toFixed(1) + 'K';
            return Math.floor(num);
        }
    
        animate(timestamp) {
            if (!this.startTime) this.startTime = timestamp;
            const progress = timestamp - this.startTime;
            const current = this.easeOutQuad(progress, this.start, this.end - this.start, this.duration);
            this.element.textContent = this.formatNumber(current);
            if (progress < this.duration) {
                requestAnimationFrame(this.animate);
            } else {
                this.element.textContent = this.formatNumber(this.end); // Ensure final value
            }
        }
    
        // Ease out function
        easeOutQuad(t, b, c, d) {
            t /= d;
            return -c * t*(t-2) + b;
        }
    
    
    }
