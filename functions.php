<?php
    // =========================================================================
    // HELPER FUNCTIONS
    // =========================================================================
    require_once dirname(__FILE__) . '/functions/helpers.php';

    // =========================================================================
    // WORDPRESS HOOKS AND FUNCTIONS
    // =========================================================================
    require_once dirname(__FILE__) . '/functions/wp/base.php';
    require_once dirname(__FILE__) . '/functions/wp-hooks.php';

    // =========================================================================
    // ADVANCED CUSTOM FIELDS
    // =========================================================================
    require_once dirname(__FILE__) . '/functions/acf/options.php';

    // =========================================================================
    // FACETWP
    // =========================================================================
    require_once dirname(__FILE__) . '/functions/facetwp/options.php';

    // =========================================================================
    // CUSTOM POST TYPES
    // =========================================================================
    // require_once dirname(__FILE__) . '/functions/cpt/faq.php';
    require_once dirname(__FILE__) . '/functions/cpt/exhibit.php';
    require_once dirname(__FILE__) . '/functions/cpt/event.php';
    require_once dirname(__FILE__) . '/functions/cpt/person.php';

    // =========================================================================
    // CUSTOM TAXONOMIES
    // =========================================================================
    require_once dirname(__FILE__) . '/functions/cpt/taxonomies/locations.php';
    require_once dirname(__FILE__) . '/functions/cpt/taxonomies/audience.php';

    