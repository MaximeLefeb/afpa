/* 
    var controller = new ScrollMagic.Controller();

    $(function () {
        var scene = new ScrollMagic.Scene({triggerElement: "#trigger1", duration: 300})
            .setPin("#pin1")
            .addIndicators({name: "1 (duration: 300)"})
            .addTo(controller)
        ;
    }); 

    duration: 100, //* the scene should last for a scroll distance of 100px
    offset: 50 //* start this scene after scrolling for 50px
    triggerElement: '#pinned-trigger1', //* starting scene, when reaching this element

    var tween = TweenMax.from('#animation', 0.5, {
        backgroundColor: 'rgb(255, 39, 46)',
        scale: 5,
        rotation: 360    
    });

    var tween = TweenMax.to('#first-animation', 0.5, {
        backgroundColor: 'red',
        scale: 5,
        rotation: 360
    });

    var tween = TweenMax.fromTo('#animation', 0.5,
        {
            backgroundColor: 'rgb(255, 39, 46)',
            scale: 5,
            left: -400
        },
        {
            scale: 1,
            left: 400,
            rotation: 360,
            repeat: -1, //* Aka an infinite amount of repeats
            yoyo: true //* Make it go back and forth or not 
        }
    );

    var tween = TweenMax.staggerFromTo('.animation', 0.5,
        {
            scale: 1,
        },
        {
            backgroundColor: 'rgb(255, 39, 46)',
            scale: 5,
            rotation: 360
        },
        0.4 //* Stagger duration 
    );

    //* set inside scene to add class to a element
    .setClassToggle('body', 'scene-is-active')
*/

var scrollMagicController = new ScrollMagic.Controller();

var tween = TweenMax.fromTo('#devSpan', 5, 
    {
        fontSize: '3vw'
    },
    {
        fontSize: '5vw'
    }
);
new ScrollMagic.Scene({triggerElement: '#devTools', duration: 200 })
    .setTween(tween)
    .addTo(scrollMagicController)
;

//* START REFLECT EFFECT *//
var reflectEffect1 = TweenMax.fromTo('.reflectMaxOne', 0.5, 
    {
        top: '1.4vw'
    },
    {
        top: '-1.4vw'
    }
);
var reflectEffect2 = TweenMax.fromTo('.reflectMaxTwo', 0.5, 
    {
        top: '2.5vw'
    },
    {
        top: '-2.6vw'
    }
);
new ScrollMagic.Scene({offset: 0, duration: 300 })
    .setTween(reflectEffect1)
    .addTo(scrollMagicController)
;
new ScrollMagic.Scene({offset: 0, duration: 300 })
    .setTween(reflectEffect2)
    .addTo(scrollMagicController)
;
//* END REFLECT EFFECT *//

/* $('#devSpan').textillate({ in: { effect: 'rollIn' } }); */