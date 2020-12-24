<?php
class Helper {
    static function get_navigation_bar_links() {
        // This method will return a list of links. Each
        // link will contain a title and a url.
        $links = array();

        // For all admin controllers of our application
        $files = new GlobIterator(
            APPPATH.'classes/controller/admin/*.php'
        );
        foreach($files as $file)
        {
            // Url and title are deducted from the file
            // basename
            $section_segment = $file->getBasename('.php');
            $links[] = array(
                'title' => Inflector::humanize(
                    $section_segment
                ),
                'url' => 'admin/'.$section_segment,
            );
        }

        // Currently, only one path is defined:
        // APPPATH/module. But this could to change.
        $module_paths = \Config::get('module_paths');
        foreach ($module_paths as $module_path) {
            // For each admin controller of each module
            $files = new GlobIterator(
                $module_path
                .
                '*/classes/controller/admin/*.php'
            );
            foreach($files as $file)
            {
                // We get the module name from the path...
                $exploded_path = explode(
                    '/',
                    $file->getPath()
                );
                $module = $exploded_path[
                    count($exploded_path) - 4
                ];
                $section_segment = $file->getBasename('.php');
                $links[] = array(
                    'title' => Inflector::humanize(
                        $section_segment
                    ),
                    'url' => $module.'/admin/'.$section_segment,
                );
            }
        }

        return $links;
    }
}
