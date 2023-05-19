<?php
function bfs_shortest_path($graph, $start, $end) {
    $queue = array();  // Create an empty queue
    $visited = array_fill(0, count($graph), false);
    $previous = array_fill(0, count($graph), null);

    $visited[$start] = true;
    array_push($queue, $start);  // Add the start node to the queue

    while (!empty($queue)) {
        $current = array_shift($queue);  // Remove the first element from the queue

        if ($current === $end) {
            // We have found the end node, backtrack from the end node to the start node and return the path
            $path = array();
            while ($current !== null) {
                array_unshift($path, $current);
                $current = $previous[$current];
            }
            return $path;
        }

        // Visit all the neighbors of the current node
        foreach (array_keys($graph[$current], true) as $neighbor) {
            if (!$visited[$neighbor]) {
                $visited[$neighbor] = true;
                $previous[$neighbor] = $current;
                array_push($queue, $neighbor);
            }
        }
    }

    // If we reach here, there is no path from start to end
    return null;
}