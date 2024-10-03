<?php

// src/Controller/MeetingController.php

namespace App\Controller;

use App\Entity\Meeting;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MeetingController extends AbstractController
{
    /**
     * @Route("/save-meeting", name="save_meeting", methods={"POST"})
     */
    public function saveMeeting(Request $request, EntityManagerInterface $entityManager)
    {
        // Retrieve form data from the request
        $title = $request->request->get('title');
        $start = $request->request->get('start');
        $end = $request->request->get('end');

        // Create new Meeting entity and set values
        $meeting = new Meeting();
        $meeting->setTitle($title);
        $meeting->setStartDateTime(new \DateTime($start));
        $meeting->setEndDateTime(new \DateTime($end));

        // Save to database
        try {
            $entityManager->persist($meeting);
            $entityManager->flush();

            return new JsonResponse(['success' => true]);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    // src/Controller/MeetingController.php

/**
 * @Route("/calendar/monthly", name="monthly_calendar")
 */
public function showMonthlyCalendar(Request $request): Response
{
    // Get current year and month or from query parameters
    $year = $request->query->get('year', date('Y'));
    $month = $request->query->get('month', date('m'));

    // Get the first day of the month and calculate the number of days in the month
    $firstDayOfMonth = new \DateTime("$year-$month-01");
    $daysInMonth = (int)$firstDayOfMonth->format('t'); // Total days in the month
    $startDayOfWeek = (int)$firstDayOfMonth->format('N'); // Day of the week (1=Monday, 7=Sunday)

    // Pass data to the template
    return $this->render('meeting/index.html.twig', [
        'year' => $year,
        'month' => $month,
        'daysInMonth' => $daysInMonth,
        'startDayOfWeek' => $startDayOfWeek,
    ]);
}

}
