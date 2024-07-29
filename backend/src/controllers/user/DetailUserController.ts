import {Request, Response} from "express";
import {DetailsUserServices} from '../../services/user/DetailsUserServices';

class DetailUserController {
    async handleDetailUserController(req: Request, res: Response) {
        const detailUserService = new DetailsUserServices();

        const user = await detailUserService.execute();

        return res.json(user);
    }
}

export {DetailUserController}