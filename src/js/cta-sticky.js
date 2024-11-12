// Intersection Observer 




const ctaMenu = document.querySelector('.cta-menu-section')

const hero = document.querySelector('.hero-section')


const ctaHandler = (entries) => {
    console.log("hello",entries)
    // entries is an array of observed dom nodes
    // we're only interested in the first one at [0]
    // because that's our .sentinal node.
    // Here observe whether or not that node is in the viewport
    if (!entries[0].isIntersecting) {
        console.log("intersect")
      ctaMenu.classList.add('sticky-cta')
    } 

  }

  const heroHandler = (entries) => {
    console.log("2",entries)
    if (entries[0].isIntersecting) {
        console.log("intersect2")
       ctaMenu.classList.remove('sticky-cta')
    } 

    
  }

  let ctaOptions = {
    root: null,
    rootMargin: '-10px',
    threshold: 0
  }

  let heroOptions ={
    root: null,
    rootMargin: '0px',
    threshold: 0
  }

  const observer = new window.IntersectionObserver(ctaHandler,ctaOptions)
  const heroObserver = new window.IntersectionObserver(heroHandler,heroOptions)
// give the observer some dom nodes to keep an eye on
observer.observe(ctaMenu);
heroObserver.observe(hero);




