import './bootstrap';

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

document.addEventListener('DOMContentLoaded', () => {

  const animatedElements = gsap.utils.toArray('.animate-on-scroll');

  animatedElements.forEach((element, index) => {
    gsap.from(element, {
      scrollTrigger: {
        trigger: element,
        start: 'top 85%',
        toggleActions: 'play none none none',
      },
      opacity: 0,
      y: 30,
      duration: 1.5,
      ease: 'power2.out',
      delay: index * 0.35,
    });
  });

  const gridItems = gsap.utils.toArray('.animate-grid-item');

  gridItems.forEach((item, index) => {
    gsap.from(item, {
      scrollTrigger: {
        trigger: item,
        start: 'top 85%',
        toggleActions: 'play none none none',
      },
      opacity: 0,
      y: 30,
      duration: 0.8,
      ease: 'power2.out',
      delay: index * 0.1, // Delay menor para grid (mais rápido)
    });
  });
});
