<?php     
class ItemsPartialShortcodePlugin extends Omeka_Plugin_AbstractPlugin {

    protected $_hooks = array('initialize');

      public function hookInitialize()
    {
        add_shortcode('itemspartial', array($this, 'shortcodeItemsPartial'));
    }

    public function shortcodeItemsPartial($args, $view)
    {
        $params = array();

        if (isset($args['is_featured'])) {
            $params['featured'] = $args['is_featured'];
        }

        if (isset($args['has_image'])) {
            $params['hasImage'] = $args['has_image'];
        }

        if (isset($args['collection'])) {
            $params['collection'] = $args['collection'];
        }

        if (isset($args['item_type'])) {
            $params['item_type'] = $args['item_type'];
        }

        if (isset($args['tags'])) {
            $params['tags'] = $args['tags'];
        }

        if (isset($args['user'])) {
            $params['user'] = $args['user'];
        }

        if (isset($args['ids'])) {
            $params['range'] = $args['ids'];
        }

        if (isset($args['sort'])) {
            $params['sort_field'] = $args['sort'];
        }

        if (isset($args['order'])) {
            $params['sort_dir'] = $args['order'];
        }

        if (isset($args['template'])) {
            $params['template'] = $args['template'];
        } else {
            $params['template'] = 'single';
        }

        if (isset($args['num'])) {
            $limit = $args['num'];
        } else {
            $limit = 10; 
        }

        $items = get_records('Item', $params, $limit);

        $content = '';
        foreach ($items as $item) {
           $content .= $view->partial('items/' . $params['template'] . '.php', array('item' => $item));
        }

        return $content;
    }
}
?>