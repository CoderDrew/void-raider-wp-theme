(function (wp) {
  const { registerBlockType } = wp.blocks;
  const { InspectorControls } = wp.blockEditor;
  const { PanelBody, RangeControl, ToggleControl } = wp.components;
  const { createElement: el } = wp.element;
  const ServerSideRender = wp.serverSideRender;

  registerBlockType('voidraider/download-grid', {
    title: 'Download Grid',
    icon: 'download',
    category: 'widgets',
    description: 'Display a grid of download cards',
    keywords: ['download', 'grid', 'files'],
    attributes: {
      postsToShow: {
        type: 'number',
        default: 4
      },
      showAlphaNotice: {
        type: 'boolean',
        default: true
      }
    },
    supports: {
      align: ['wide', 'full']
    },

    edit: function ({ attributes, setAttributes }) {
      return el(
        'div',
        null,
        el(
          InspectorControls,
          null,
          el(
            PanelBody,
            { title: 'Download Grid Settings' },
            el(RangeControl, {
              label: 'Number of downloads',
              min: 1,
              max: 12,
              value: attributes.postsToShow,
              onChange: (v) => setAttributes({ postsToShow: v })
            }),
            el(ToggleControl, {
              label: 'Show alpha notice',
              checked: attributes.showAlphaNotice,
              onChange: (v) => setAttributes({ showAlphaNotice: v })
            })
          )
        ),
        el(ServerSideRender, {
          block: 'voidraider/download-grid',
          attributes: attributes
        })
      );
    },

    save: function () {
      return null;
    }
  });
})(window.wp);
