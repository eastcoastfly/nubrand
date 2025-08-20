class NuTabs {
  constructor(box) {
    if (!box) return;

    box.querySelectorAll('.wp-block-ub-tabbed-content-tab-title').forEach( el => { this.buildTab(el) });
  }

  buildTab(tab) {
    const color = tab.innerText.toUpperCase();
    tab.innerText = '';
    tab.style.backgroundColor = color;

    if (color == '#FFF' || color == '#FFFFFF') {
      tab.style.border = '1px solid #000';
    }
  }
}

class ScrollTop {
  constructor(id) {
    if (!id) return;
    
    const btn = document.getElementById(id);
    if (!btn) return;

    this.btn = btn;
    this.scrollY = window.scrollY;

    window.addEventListener('scroll', () => {
      this.scrollY = window.scrollY;
      this.trigger();
    });

    btn.addEventListener('click', this.clickHandler.bind(this) );

    this.trigger();
  }

  trigger() {
    if (this.scrollY >= 200) {
      document.body.classList.add('scroll-visible');
    } else {
      document.body.classList.remove('scroll-visible');
    }
  }

  clickHandler() {
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  }
}

class NuAos {
  constructor() {
    if ( typeof AOS !== 'object' ) return;

    this.durationTime = 800;

    this.hero();
    this.mediaText();
    this.fadeUp();
    this.borderContent();
    this.zoonInUp();

    setTimeout( () => {
      AOS.init();
    }, 100 );
  }

  hero() {
    document.querySelectorAll('.wp-block-cover__inner-container').forEach(el => {
        el.setAttribute('data-aos', 'fade-right' )
        this.duration(el);
    });
  }

  mediaText() {
    document.querySelectorAll('.wp-block-media-text').forEach(el => {

      const media = el.querySelector('.wp-block-media-text__media');
      const content = el.querySelector('.wp-block-media-text__content');

      let isVisible = this.isInViewport(el);

      if (!media || !content) return;

      if (el.classList.contains('has-media-on-the-right')) {
        
        media.setAttribute('data-aos', 'fade-left' )
        content.setAttribute('data-aos', 'fade-right' )
        
      } else {
        
        media.setAttribute('data-aos', 'fade-right' )
        content.setAttribute('data-aos', 'fade-left' )

      }

      this.duration(media);
      this.duration(content);
    });
  }

  fadeUp() {
    let selector = [
      '.marks',
      '.colors-menu',
      '.color-switcher',
      '.nu-fade-up',
      '.acf-block.cards'
    ];
    selector = selector.join(',');
  
    document.querySelectorAll(selector).forEach(el => {
        el.setAttribute('data-aos', 'fade-up' )
        this.duration(el);
    });
  }
  
  borderContent() {
    document.querySelectorAll('.left-border-content').forEach(el => {
      el.setAttribute('data-aos', 'fade-down' )
      this.duration(el);
    });
  }
  
  zoonInUp() {
    let selector = [
      '.nu-aos-on-figire figure',
      '.merchandise-gallery figure',
      '.stylized-group__gallery figure',
      '.stylized-group',
      '.nu-zoom-up',
      '.flip-box',
      '.gus-counts',
      '.nu-table__row > .wp-block-column > .wp-block-columns > .wp-block-column'
    ];
    selector = selector.join(',');

    document.querySelectorAll(selector).forEach(el => {
      el.setAttribute('data-aos', 'zoom-in-up' );
      this.duration(el);
    });

    document.querySelectorAll('.colors-menu .wp-block-column').forEach(el => {
      el.setAttribute('data-aos', 'zoom-in-right' );
      this.duration(el);
    });
  }


  duration(el, time) {
    if (!time) time = this.durationTime;
    el.setAttribute('data-aos-duration', time );
  }
  
  isInViewport(element) {
    const rect = element.getBoundingClientRect();
    const wh = (window.innerHeight || document.documentElement.clientHeight);

    let isVis = null;

    if (rect.top > wh) {
      isVis = false;
    } else if (rect.bottom < 0){
      isVis = false;
    } else {
      isVis = true;
    }

    return isVis;
  }

}

class NuMobHeader {
  constructor() {
    
    this.mob = false;
    this.ww = window.innerWidth;

    this.hasClassOnInit = document.body.classList.contains('is-dark-header');
    this.fire();
    
    jQuery(window).on('resize', () => {
      this.ww = window.innerWidth;
      this.fire();
    });
    
  }
  
  fire() {

    if (this.ww < 1025) document.body.classList.add('is-dark-header');
    if (this.ww > 1024 && !this.hasClassOnInit) {
      document.body.classList.remove('is-dark-header');
    }

  }

}


document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.color-switcher').forEach( el => new NuTabs(el) );
  new ScrollTop('scroll-to-top');

  new NuMobHeader();
});

window.addEventListener('load',function(){

  const container = $('.abc-wrap nav');
  const btn = $('.wp-block-navigation-submenu__toggle');

  jQuery(document).mouseup(function (e) {
    if (container.has(e.target).length === 0) {
      btn.attr('aria-expanded', false)
    }
  });

  container.find('a.wp-block-navigation-item__content').on('click', () => {
    btn.attr('aria-expanded', false)
  })

  new NuAos();
});
